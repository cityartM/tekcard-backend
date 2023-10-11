<?php

namespace Modules\Address\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\Models\Country;
use Modules\Address\Models\Wilaya;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $Countries= Country::all();
        $Willayas= Wilaya::with('country')->paginate(10);
        return view('address::country.index_country',compact('Countries','Willayas'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('address::country.create_country');
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
            'code' => 'required',
        ]);

        Country::create(array_merge(request()->all()));
        return redirect()->route('country.index')->with('success', 'Country created successfully.');
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
        $country = Country::find($id);
        $locale = app()->getLocale();
        return view('address::country.edit_country', compact('country','locale'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $country->update(request()->validate([
            'name' => 'required|array',
            'name.*' => 'required|string',
            'code' => 'required|string',
            'lat' => 'required|string',
            'lon' => 'required|string',
        ]));
        return redirect()->route('country.index')->with('success', 'Country updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('country.index')->with('success', 'Country deleted successfully.');

    }
}
