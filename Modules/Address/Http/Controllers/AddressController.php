<?php

namespace Modules\Address\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\Models\Country;
use Modules\Address\Models\Wilaya;
use Modules\Address\Repositories\CountryRepository;
use App\Helpers\Helper;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class AddressController extends Controller
{
         /**
     * @var CountryRepository
     */
    private $countries;
    protected $request;

    /**
     * ServicesController constructor.
     * @param CountryRepository $services
     */
    public function __construct(CountryRepository $countries, Request $request)
    {
        $this->countries = $countries;
        $this->request = $request;

    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->countries->getWilayaDatatables()->datatables($request);
        }
        return view("address::wilaya.index_wilaya")->with([
            "columns" => $this->countries->getWilayaDatatables()::columns(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create(Request $request)
    {
            $countryOptions= Country::where('display',1)->pluck('name', 'id');
            //$Countries= Country::where('display',1)->pluck('name', 'id');
            /*$countryOptions = $Countries->map(function ($country) {
                return [
                    'value' => $country->id,
                    'label' => $country->name, // Adjust the locale as needed
                ];
            })->pluck('label', 'value')->toArray();*/
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
            'name' => 'required|array',
            'code' => 'required',
            'country_id' => 'required',
        ]);

        $data =$request->all();

        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['name'] = Helper::translateAttribute($data['name']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();

            $data['name'] = Helper::translateAttribute($data['name'] + ['lang' => $lang]);
        }

        Wilaya::create($data);

        return redirect()->route('address.index')->with('success', 'Wilaya created successfully.');


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
        //$country = Country::findOrFail($wilaya->country_id);
        $countries = Country::where('display',1)->pluck('name','id');
        //return $country;
        return view('address::wilaya.edit_wilaya', compact('wilaya','countries','locale'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        dd($request->all());
        $wilaya = Wilaya::findOrFail($id);
            $validatedData = $request->validate([
                'name.*' => 'required',
                'country_id' => 'required',
                'delivery_price' => 'required',
                'lan' => 'nullable',
                'lon' => 'nullable',
            ]);
            $wilaya->name = $validatedData['name'];
            $wilaya->country_id = $validatedData['country_id'];
            $wilaya->delivery_price = $validatedData['delivery_price'];
            if(isset( $validatedData['lat'])){
                $wilaya->lat = $validatedData['lat'];
            }
            if(isset( $validatedData['lat'])){
                $wilaya->lon = $validatedData['lon'];
            }

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
