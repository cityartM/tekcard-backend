<?php

namespace Modules\Card\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


use Modules\Card\Repositories\ShippingRepository;
use Modules\Card\Models\Shipping;
use Modules\Background\Models\Background;
use App\Helpers\Helper;
use Modules\Card\Http\Requests\CreateShippingRequest;
use Modules\Address\Models\Country;
use Illuminate\Support\Facades\Auth;


class ShippingController extends Controller
{

    

    public function __construct(ShippingRepository $shippings)
    {
        $this->shippings = $shippings;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->shippings->getDatatables()->datatables($request);
        }
        return view("card::index_shipping")->with([
            "columns" => $this->shippings->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $countries = Country::pluck('name', 'id');
        $edit= false;
        return view('card::add-edit-shipping' , compact('edit','countries'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateShippingRequest $request)
    {
       // dd($request);
        $data = $request->only(['country_id','state','zip_code','address']);

        $data['user_id'] = Auth::id();

        $shipping = $this->shippings->create($data);

        return redirect()->route('shippings.index')->with('success', 'shipping address created successfully');
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
    public function edit(Shipping $shipping)
    {
        $countries = Country::pluck('name', 'id');
        $edit= true;
        return view('card::add-edit-shipping', compact('edit','shipping','countries'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreateShippingRequest $request, Shipping $shipping)
    {
        $data = $request->only(['country_id','state','zip_code','address']);

        $shipping = $this->shippings->update($shipping->id,$data);


        return redirect()->route('shippings.index')
            ->with('success', 'shipping address  entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Shipping $shipping)
    {
            $shipping->delete();

            return redirect()->route('shippings.index')
            ->with('success', 'shipping address  entry deleted successfully');
    }
}
