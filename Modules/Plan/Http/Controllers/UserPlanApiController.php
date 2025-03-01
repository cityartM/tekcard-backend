<?php

namespace Modules\Plan\Http\Controllers;


use App\Helpers\Helper;
use App\Http\Resources\UserResource;
use App\Repositories\Role\RoleRepository;
use App\Repositories\User\UserRepository;
use App\Support\Enum\UserStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

use Modules\Card\Repositories\CardRepository;
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

    private $cards;

    private $only = ['full_name','job_title','phone','bio','country_id','address'];

    public function __construct(CompanyRepository $companies, UserRepository $users,PlanRepository $plans ,UserPlanRepository $userPlans,RoleRepository $roles,CompanyAvatarManager $avatarManager,CardRepository $cards)
    {
        $this->users = $users;
        $this->plans = $plans;
        $this->userPlans = $userPlans;
        $this->roles = $roles;
        $this->avatarManager = $avatarManager;
        $this->companies = $companies;
        $this->cards = $cards;
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

          if($existPlan?->plan_id === $plan->id) return $this->sendFailedResponse('You already have a plan', 200);

          if($plan->type == PlanType::COMPANY)
          {
              return $this->sendFailedResponse('This plan is not for clients', 200);
          }

          // if exist plan not  new plan upgrade and update old plan to expired
         if($existPlan) {
            $existPlan->update(['expired_date' => now()->subDay()->format('Y-m-d')]);
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
                'has_video' => $plan->has_video ?? 0,
                'has_pdf' => $plan->has_pdf ?? 0,
                'has_multiple_image' => $plan->has_multiple_image ?? 0,
                'has_water_mark' => $plan->has_water_mark ?? 0,
                'has_share_offline' => $plan->has_share_offline ?? 0,
                'share_with_image' => $plan->share_with_image ?? 0,
                'has_scan_ia' => $plan->has_scan_ia ?? 0,
                'has_group_contact' => $plan->has_group_contact ?? 0,
                'has_scan_location' => $plan->has_scan_location ?? 0,
                'has_note_contact' => $plan->has_note_contact ?? 0,
                'has_statistic' => $plan->has_statistic ?? 0,
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

        if($existPlan?->plan_id === $plan->id) return $this->sendFailedResponse('You already have a plan', 200);

        if($plan->type == PlanType::CLIENT)
        {
            return $this->sendFailedResponse('This plan is not for companies', 200);
        }
        // if exist plan not  new plan upgrade and update old plan to expired
        if($existPlan) {
            $existPlan->update(['expired_date' => now()->subDay()->format('Y-m-d')]);
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
            'has_video' => $plan->has_video,
            'has_pdf' => $plan->has_pdf,
            'has_multiple_image' => $plan->has_multiple_image,
            'has_water_mark' => $plan->has_water_mark,
            'has_share_offline' => $plan->has_share_offline,
            'share_with_image' => $plan->share_with_image,
            'has_scan_ia' => $plan->has_scan_ia,
            'has_group_contact' => $plan->has_group_contact,
            'has_scan_location' => $plan->has_scan_location,
            'has_note_contact' => $plan->has_note_contact,
            'has_statistic' => $plan->has_statistic,
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

        $company = $this->companies->create($dataCompany +[
                                       'status' => UserStatus::ACTIVE,
                                       'avatar' => $avatarName
                                      ]);

        $this->userPlans->create($data);

        $user = $this->users->update(auth()->user()->id, [
                                                    'role_id' => $role->id,
                                                    'status' => UserStatus::ACTIVE,
                                                    'company_id' => $company->id
                                                 ]);

          /****Start Create card for company****/

            $dataCard['reference'] = Helper::generateCode(15);
            $dataCard['name'] = $request->full_name;
            $dataCard['full_name'] = $request->full_name;
            $dataCard['company_name'] = $request->full_name;
            $dataCard['job_title'] = $request->job_title;
            $dataCard['user_id'] = $user->id;
            $dataCard['company_id'] = $company->id;
            $dataCard['is_main'] = 1;

            $card = $this->cards->create($dataCard);

            if ($request->hasFile('file') ) {
                $card->addMedia($request->file('file'))->toMediaCollection('CARD_AVATAR');
            }

          /****End Create card for company****/
        return $this->respondWithSuccess([
            'user' => new UserResource($user),
        ],  'Plan purchased successfully', 200);
    }

}
