<?php

namespace Modules\Card\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Modules\Address\Models\Country;

use Modules\Card\Repositories\CardOrderRepository;
use Modules\Card\Models\CardOrder;
use Modules\Card\Http\Requests\CreateCardOrderRequest;

class CardOrderController extends Controller
{

    private $cardOder;

    public function __construct(CardOrderRepository $cardOrders)
    {
        $this->cardOrders = $cardOrders;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->cardOrders->getDatatables()->datatables($request);
        }
        return view("card::index_orders")->with([
            "columns" => $this->cardOrders->getDatatables()::columns(),
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
        $country = Country::pluck('name', 'id');
        //dd($userCards);
        $edit=false;
        return view('card::add-edit-order',compact("edit","userCards","country"));
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

        $data['user_id'] = $user->id;
        $data['company_id'] = $user->company_id;

        $order = $this->cardOrders->create($data);

        $order->cards()->attach($request->card_ids)->save();

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
