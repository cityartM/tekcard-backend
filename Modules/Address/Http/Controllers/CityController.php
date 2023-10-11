<?php

namespace Modules\Address\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\Models\Country;
use Modules\Address\Models\Wilaya;
use Modules\Address\Models\City;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $locale = app()->getLocale();
        $cities= City::with('wilaya')->paginate(10);
        return view('address::city.index',compact('cities','locale'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */

    public function create(Request $request)
    {
        $type = $request->query('type');

        $language = app()->getLocale();

        $countries = Country::all();
        $wilayas = Wilaya::all();

        $countryNames = [];
        $wilayaNames = [];

        foreach ($countries as $country) {
            $countryNames[$country->id] = json_decode($country->name)->$language;
        }

        foreach ($wilayas as $wilaya) {
            $wilayaNames[$wilaya->id] = json_decode($wilaya->name)->$language;
        }

        $wilayasByCountry = $wilayas->groupBy('country_id')->map(function ($wilayas) use ($language) {
            return $wilayas->map(function ($wilaya) use ($language) {
                return [
                    'id' => $wilaya->id,
                    'name' => json_decode($wilaya->name)->$language,
                ];
            });
        });

        return view('address::city.create_city', compact('countryNames', 'wilayaNames', 'wilayasByCountry', 'type'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'wilaya_id' => 'required',
            'lat' => 'required',
            'lon' => 'required',
        ]);
        $name = [
            'en' => $request->input('name.en'),
            'ar' => $request->input('name.ar'),
            'fr' => $request->input('name.fr'),
        ];
        City::create([
            'name' => json_encode($name),
            'wilaya_id' => $request->input('wilaya_id'),
            'lat' => $request->input('lat'),
            'lon' => $request->input('lon'),
        ]);

        return redirect()->route('city.index')->with('success', 'City created successfully.');

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
    public function edit($city)
    {
        $locale = app()->getLocale();
        $city = City::find($city);

        // Get all distinct country names
        $countryNames = Wilaya::with('country')
            ->get()
            ->pluck('country.name')
            ->unique()
            ->values()
            ->all();

        $countries = Country::all();
        $wilaya = Wilaya::findOrFail($city->wilaya_id);
        $wilayas = Wilaya::all();

        return view('address::city.edit_city', compact('wilaya', 'city', 'countryNames', 'countries', 'wilayas', 'locale'));
    }




    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name.*' => 'required',
            'lat' => 'required',
            'lon' => 'required',
            'wilaya_id' => 'required',
        ]);

        $city = City::findOrFail($id);

        $city->name = $validatedData['name'];
        $city->lat = $validatedData['lat'];
        $city->lon = $validatedData['lon'];
        $city->wilaya_id = $validatedData['wilaya_id'];

        $city->save();

        return redirect()->route('city.index')->with('success', 'City updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();
        return redirect()->route('address::city.edit_city')->with('success', 'Wilaya deleted successfully.');

    }
}
