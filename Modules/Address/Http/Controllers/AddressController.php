<?php

namespace Modules\Address\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\Models\Country;
use Modules\Address\Models\Wilaya;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $Countries= Country::all();
        $Willayas= Wilaya::with('country')->paginate(10);
        return view('address::wilaya.index',compact('Countries','Willayas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
            $Countries= Country::all();
            $countryOptions = $Countries->map(function ($country) {
                return [
                    'value' => $country->id,
                    'label' => json_decode($country->name, true)['en'], // Adjust the locale as needed
                ];
            })->pluck('label', 'value')->toArray();
            return view('address::wilaya.create_wilaya',compact('countryOptions'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {

        $request->validate([
            'name.en' => 'required',
            'name.ar' => 'required',
            'name.fr' => 'required',
            'lat' => 'required',
            'lon' => 'required',
        ]);

        $name = [
            'en' => $request->input('name.en'),
            'ar' => $request->input('name.ar'),
            'fr' => $request->input('name.fr'),
        ];
        if ($request->has('country_id')) {
            $request->validate([
                'country_id' => 'required',
                'code' => 'required',
            ]);

            Wilaya::create([
                'name' => json_encode($name),
                'country_id' => $request->input('country_id'),
                'lat' => $request->input('lat'),
                'lon' => $request->input('lon'),
                'code' => $request->input('code'),
            ]);

            return redirect()->route('address.index')->with('success', 'Wilaya created successfully.');
        }

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        //return view('address::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */

    public function edit($id)
    {
        $locale = app()->getLocale();
        $wilaya = Wilaya::find($id);
        $country = Country::findOrFail($wilaya->country_id);
        $countries = Country::all();
        //return $country;
        return view('address::wilaya.edit_wilaya', compact('wilaya', 'country','countries','locale'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $wilaya = Wilaya::findOrFail($id);
            $validatedData = $request->validate([
                'name.*' => 'required',
                'lat' => 'required',
                'lon' => 'required',
                'country_id' => 'required',
            ]);
            $wilaya->name = $validatedData['name'];
            $wilaya->country_id = $validatedData['country_id'];
            $wilaya->lat = $validatedData['lat'];
            $wilaya->lon = $validatedData['lon'];
            $wilaya->save();
            return redirect()->route('address.index')->with('success', 'Wilaya updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Request $request,$id)
    {
        $wilaya = Wilaya::findOrFail($id);
        $wilaya->delete();
        return redirect()->route('address.index')->with('success', 'Wilaya deleted successfully.');

    }
}
