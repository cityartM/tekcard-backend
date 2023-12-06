<?php

namespace Modules\Card\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Auth;
use Modules\Card\Models\Shipping;
use Modules\Card\Repositories\CardOrderRepository;

use Modules\Card\Http\Requests\CreateCardOrderRequest;
use Modules\Card\Http\Resources\CardOrderResource;

use Modules\Card\Models\CardOrder;


class CardOrderApiController extends ApiController
{

    private $cardOrders;

    public function __construct(CardOrderRepository $cardOrders)
    {
        $this->cardOrders = $cardOrders;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('card::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('card::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateCardOrderRequest $request)
    {
        $user = Auth::user();
        $userCards = $user->cards;
        $userCardsIds = $userCards->pluck('id')->toArray();
        $requestCardsIds = $request->card_ids;
        $diff = array_diff($requestCardsIds, $userCardsIds);
        if (!empty($diff)) {
            return $this->respondWithError(
                ['message' => 'You can not order cards that are not yours'],
                'You can not order cards that are not yours', 403
            );
        }
        $data = $request->only(['card_ids', 'quantity', 'color' , 'company_id','country_id','state','zip_code','address']);

        $order = $this->cardOrders->create($data);

        $order->cards()->attach($request->card_ids)->save();

        //$order->cards()->create($data);


        return $this->respondWithSuccess([
            'order' => new CardOrderResource($order),
        ], 'Order created successfully', 200);

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('card::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('card::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $order = CardOrder::find($id);

        if (!$order) {
        return $this->respondWithSuccess(
            ['message' => 'order not found'],
            'order not found',404
        );}

        $order->delete();

        return $this->respondWithSuccess([
            'order' => new CardOrderResource($order),
        ],  'Order deleted successfully', 200);
    }
}
