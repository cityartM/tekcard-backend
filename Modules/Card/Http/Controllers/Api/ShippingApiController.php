<?php

namespace Modules\Card\Http\Controllers\Api;


use App\Helpers\Helper;
use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use App\Repositories\Role\RoleRepository;
use App\Support\Enum\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\Card\Http\Filters\CardKeywordSearch;
use Modules\Card\Http\Requests\CreateCardRequest;
use Modules\Card\Http\Requests\CreateShippingAddRequest;
use Modules\Card\Http\Requests\UpdateRefCardRequest;
use Modules\Card\Http\Requests\UpdateShippingAddRequest;
use Modules\Card\Http\Resources\CardResource;
use Modules\Card\Http\Resources\ShippingResource;
use Modules\Card\Models\Card;
use Modules\Card\Models\Shipping;
use Modules\Card\Repositories\CardRepository;
use Modules\Card\Repositories\ShippingRepository;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class ShippingApiController extends ApiController
{
    private $shippingAddresses;

    public $only = ['state','zip_code', 'address', 'is_main', 'country_id'];

    public function __construct(ShippingRepository $shippingAddresses)
    {
        $this->shippingAddresses = $shippingAddresses;
    }
    public function index(Request $request)
    {
        $shippingAddresses = QueryBuilder::for(Shipping::class)
         ->where('user_id',auth()->user()->id)
         ->allowedFilters([
            AllowedFilter::custom('search', new CardKeywordSearch),
        ])
        ->allowedSorts(['id,is_main'])
        ->defaultSort('-is_main')
        ->paginate($request->per_page ?: 10);


        return $this->respondWithSuccess([
            'shipping' => ShippingResource::collection($shippingAddresses)->response()->getData(true),
        ],  'Shipping address retrieved successfully', 200);

    }


    /**
     * @param Shipping $shipping
     * @return \Illuminate\Http\JsonResponse
     */

    public function show(Shipping $shipping)
    {
        return $this->respondWithSuccess([
            'shipping' => new ShippingResource($shipping),
        ], 'Shipping address retrieved successfully', 200);
    }

    /**
     * @param CreateShippingAddRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CreateShippingAddRequest $request)
    {
        $data = $request->only($this->only);
        $data['user_id'] = auth()->user()->id;
        $shipping = $this->shippingAddresses->create($data);

        return $this->respondWithSuccess([
            'shipping' => new ShippingResource($shipping),
        ], 'Card created successfully', 200);
    }


    /**
     * @param Shipping $shipping
     * @param UpdateShippingAddRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Shipping $shipping, UpdateShippingAddRequest $request)
    {
        $data = $request->only($this->only);
        $data['user_id'] = auth()->user()->id;
        $shipping = $this->shippingAddresses->update($shipping->id, $data);

        return $this->respondWithSuccess([
            'shipping' => new ShippingResource($shipping),
        ], 'Shipping address updated successfully', 200);
    }





}
