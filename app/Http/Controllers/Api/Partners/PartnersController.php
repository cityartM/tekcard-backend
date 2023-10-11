<?php

namespace App\Http\Controllers\Api\Partners;

use App\Helpers\Helper;
use App\Http\Controllers\Api\ApiController;
use App\Http\Filters\PartnerKeywordSearch;
use App\Http\Requests\Partner\CreatePartnerRequest;
use App\Http\Resources\PartnerResource;
use App\Models\Partner;
use App\Repositories\Partner\PartnerRepository;
use App\Repositories\User\UserRepository;
use App\Support\Enum\PartnerEnum;
use App\Support\Enum\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use DB;

class PartnersController extends ApiController
{

    private $partners;

    private $users;

    private $only = ['type', 'name','bio','phone','mobile','city_id','lng','lat','address','avatar','reg_com','agreement','verification_at'];


    /**
     * @param PartnerRepository $partners
     * @param UserRepository $users
     */

    public function __construct(PartnerRepository $partners, UserRepository $users)
    {
        //$this->middleware('permission:partners.manage')->except(['updateInformation']);
        $this->partners = $partners;
        $this->users = $users;
    }


    /**
     * Paginate all partners.
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $partners = QueryBuilder::for(Partner::class)
            ->allowedFilters([
                AllowedFilter::custom('search', new PartnerKeywordSearch),
                AllowedFilter::exact('status'),
            ])
            ->allowedIncludes(PartnerResource::allowedIncludes())
            ->allowedSorts(['id', 'name', 'created_at'])
            ->defaultSort('-id')
            ->fastPaginate($request->per_page ?: 20);

        return $this->respondWithSuccess([
                  "partners" => PartnerResource::collection($partners)
             ],
            "Partners retrieved successfully",
            200
        );
    }

    public function store(CreatePartnerRequest $request)//: array
    {
        $data = $request->only($this->only);

        $data += [
            'status' => UserStatus::UNCONFIRMED,
            'old_balance' => 0,
            'balance' => 0,
        ];
        $user = auth()->user();

        if($user->partner_id != null){
            return $this->sendFailedResponse('You are already a partner', 422);
        }
        $partner = DB::transaction(function () use ($request,$data,$user) {
            $createdPartner = $this->partners->create($data);

            if ($request->hasFile("avatar")) {
                $createdPartner->addMedia($request->avatar)->toMediaCollection(PartnerEnum::AVATAR);
            }
            if ($request->hasFile("reg_com")) {
                $createdPartner->addMedia($request->reg_com)->toMediaCollection(PartnerEnum::COMMERCIAL_REGISTER_PARTNER);
            }
            if ($request->hasFile("agreement")) {
                $createdPartner->addMedia($request->agreement)->toMediaCollection(PartnerEnum::AGREEMENT);
            }


            $user->update(
                ['partner_id' => $createdPartner->id]
            );

            return $createdPartner;
        });

        return $this->respondWithSuccess([
            "partners" => new PartnerResource($partner)
        ],
            'User profile transform to partner successfully',
            200
        );

    }
}
