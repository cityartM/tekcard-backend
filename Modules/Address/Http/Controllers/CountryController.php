<?php

namespace Modules\Address\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Address\Models\Country;
use Modules\Address\Models\Wilaya;
use Modules\Address\Repositories\CountryRepository;
use App\Helpers\Helper;
use App\Models\Currency;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class CountryController extends Controller
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
    /*public function index()
    {
        $Countries= Country::orderBy('display','desc')->paginate(10);
        $Willayas= Wilaya::with('country')->paginate(10);
        return view('address::country.index_country',compact('Countries','Willayas'));
    }*/


    public function index(Request $request)
    {

        if ($request->wantsJson()) {
            return $this->countries->getDatatables()->datatables($request);
        }

        return view("address::country.index_country")->with([
            "columns" => $this->countries->getDatatables()::columns(),
        ]);

    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $currencies = Currency::pluck('iso_code','iso_code');
        return view('address::country.create_country',compact('currencies'));
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
            //'currency_code' => 'required',
        ]);

        $data =$request->all();


        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['name'] = Helper::translateAttribute($data['name']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();

            $data['name'] = Helper::translateAttribute($data['name'] + ['lang' => $lang]);
        }

        if (empty($data['display'])){
            $data['display'] = 0;
        }
        Country::create($data);
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
        $currencies = Currency::pluck('iso_code','iso_code');
        return view('address::country.edit_country', compact('country','currencies'));
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


        $request->validate([
            'name' => 'required|array',
            //'currency_code' => 'required',
        ]);

        $data =$request->all();
        if (empty($data['display'])){
            $data['display'] = 0;
        }
        $country->update($data);
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
