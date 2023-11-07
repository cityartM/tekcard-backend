<?php

namespace Modules\Card\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Controllers\Api\ApiController;
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
        
        $data = $request->only(['card_id', 'quantity', 'color' , 'company_id']);

        $order = $this->cardOrders->create($data);

        return $this->respondWithSuccess([
            'cardorder' => new CardOrderResource($order),
        ], 'card order  created successfully', 200);

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
        ],  'order deleted successfully', 200);
    }
}
