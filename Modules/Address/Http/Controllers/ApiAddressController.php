<?php

namespace Modules\Address\Http\Controllers;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\Http\Resources\WilayaResource;
use Modules\Address\Models\City;
use Modules\Address\Models\Country;
use Modules\Address\Models\Wilaya;
use Modules\Address\Transformers\CityResource;
use App\Http\Resources\CountryResource;


class ApiAddressController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function countries()
    {
        $countries = Country::where('display',1)->get();
        return $this->respondWithSuccess([
            'countries' => CountryResource::collection($countries)
        ],__('response.response_successfully'),
            200);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function wilayas(Request $request)
    {
        $wilaya = Wilaya::where('country_id',$request->country_id)->get();

        return $this->respondWithSuccess(WilayaResource::collection($wilaya));
    }

    /**
     * Store a newly created resource in storage.
     * @return Renderable
     */
    public function cities($id)
    {
        $city = City::where('wilaya_id',$id)->get();
        return $this->respondWithSuccess(CityResource::collection($city));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('address::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('address::edit');
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
        //
    }
}
