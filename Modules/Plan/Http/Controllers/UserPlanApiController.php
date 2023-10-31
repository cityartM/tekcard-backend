<?php

namespace Modules\Plan\Http\Controllers;


use App\Http\Resources\UserResource;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use App\Support\Enum\UserStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Modules\Company\Repositories\CompanyRepository;
use Modules\Company\Services\CompanyAvatarManager;
use Modules\Plan\Http\Filters\PlanKeywordType;
use App\Http\Controllers\Api\ApiController;
use Modules\Plan\Http\Requests\CreateUserPlanRequest;
use Modules\Plan\Http\Resources\PlanResource;
use Modules\Plan\Models\Plan;
use Modules\Plan\Models\UserPlan;
use Modules\Plan\Repositories\PlanRepository;
use Modules\Plan\Repositories\UserPlanRepository;
use Modules\Plan\Support\Enum\PlanDuration;
use Modules\Plan\Support\Enum\PlanType;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

use Modules\ContactUser\Http\Resources\RemarkResource;


class UserPlanApiController extends ApiController
{
    private $plans;

    private $users;
    private $userPlans;

    private $companies;

    private $only = ['full_name','job_title','phone','bio','country_id','address'];

    public function __construct(CompanyRepository $companies, UserRepository $users,PlanRepository $plans ,UserPlanRepository $userPlans,RoleRepository $roles,CompanyAvatarManager $avatarManager)
    {
        $this->users = $users;
        $this->plans = $plans;
        $this->userPlans = $userPlans;
        $this->roles = $roles;
        $this->avatarManager = $avatarManager;
        $this->companies = $companies;
    }

    public function index(Request $request)
    {
          $plans = QueryBuilder::for(Plan::class)
             ->allowedFilters([
                AllowedFilter::custom('type', new PlanKeywordType),
            ])
            ->allowedSorts(['id'])
            ->defaultSort('id')
            ->paginate($request->per_page ?: 10);


    return $this->respondWithSuccess([
        'plans' => PlanResource::collection($plans)->response()->getData(true),
    ],  'Plans retrieved successfully', 200);

    }


    public function storeClient(Plan $plan)
    {
          $existPlan= auth()->user()->plan->first();

          if($existPlan) return $this->sendFailedResponse('You already have a plan', 200);

          if($plan->type == PlanType::COMPANY)
          {
              return $this->sendFailedResponse('This plan is not for clients', 200);
          }
          $data = [
                'display_name'=> $plan->getTranslations('display_name'),
                'type' => $plan->type,
                'duration' => $plan->duration,
                'purchase_date' => now()->format('Y-m-d'),
                'expired_date' => $plan->duration == PlanDuration::YEARLY ? now()->addYear()->format('Y-m-d') : now()->addMonth()->format('Y-m-d'),
                'price' => $plan->price,
                'nbr_user' => $plan->nbr_user,
                'nbr_card_user' => $plan->nbr_card_user,
                'has_dashboard' => $plan->has_dashboard,
                'features' => $plan->features,
                'user_id' => auth()->user()->id,
                'plan_id' => $plan->id,
          ];

        $this->userPlans->create($data);

        $user = $this->users->update(auth()->user()->id, ['status' => UserStatus::ACTIVE]);

        return $this->respondWithSuccess([
            'user' => new UserResource($user),
        ],  'Plan purchased successfully', 200);
    }


    public function storeCompany(CreateUserPlanRequest $request ,Plan $plan)
    {
        $dataCompany = $request->only($this->only);

        $existPlan= auth()->user()->plan->first();

        if($existPlan) return $this->sendFailedResponse('You already have a plan', 200);

        if($plan->type == PlanType::CLIENT)
        {
            return $this->sendFailedResponse('This plan is not for companies', 200);
        }
        $data = [
            'display_name'=> $plan->getTranslations('display_name'),
            'type' => $plan->type,
            'duration' => $plan->duration,
            'purchase_date' => now()->format('Y-m-d'),
            'expired_date' => $plan->duration == PlanDuration::YEARLY ? now()->addYear()->format('Y-m-d') : now()->addMonth()->format('Y-m-d'),
            'price' => $plan->price,
            'nbr_user' => $plan->nbr_user,
            'nbr_card_user' => $plan->nbr_card_user,
            'has_dashboard' => $plan->has_dashboard,
            'features' => $plan->features,
            'user_id' => auth()->user()->id,
            'plan_id' => $plan->id,
        ];

        $role = $this->roles->findByName('Company');

        $avatarName = null;

        if($request->hasFile('file')){
            $avatarName = $this->avatarManager->uploadAndCropAvatar(
                $request->file('file'),
            );
        }

        $company = $this->companies->create($dataCompany + [
                                       'status' => UserStatus::ACTIVE,
                                       'avatar' => $avatarName
                                      ]);

        $this->userPlans->create($data);

        $user = $this->users->update(auth()->user()->id, [
                                                    'status' => UserStatus::ACTIVE,
                                                    'company_id' => $company->id
                                                 ]);

        return $this->respondWithSuccess([
            'user' => new UserResource($user),
        ],  'Plan purchased successfully', 200);
    }

}
