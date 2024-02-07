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

    public $shippings;


    /**
     * @param ShippingRepository $shippings
     */
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

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {

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
    public function update(Request $request)
    {

    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request)
    {

    }
}
