<?php

namespace Modules\Card\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Modules\Card\Repositories\CardOrderRepository;
use Modules\Card\Models\CardOrder;
use Modules\Card\Http\Requests\CreateCardOrderRequest;

class CardOrderController extends Controller
{

    private $cardOder;

    function __construct(CardOrderRepository $cardOder)
    {
        $this->cardOder= $cardOder;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->cardOder->getDatatables()->datatables($request);
        }
        return view("card::index_orders")->with([
            "columns" => $this->cardOder->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $user = Auth::user(); 
        $userCards = $user->cards; 
        //dd($userCards);
        $edit=false;
        return view('card::add-edit-order',compact("edit","userCards"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateCardOrderRequest $request)
    {
        $data = $request->only(['card_id', 'quantity', 'color' , 'company_id']);

        $order = $this->cardOder->create($data);

        return redirect()->route('cardOrders.index')
        ->with('success', 'card Order entry created successfully');
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
            return redirect()->route('cardOrders.index')
            ->with('success', 'card Order dont exist');
        }

        $order->delete();

        return redirect()->route('cardOrders.index')
        ->with('success', 'card Order entry created successfully');
    }
}
