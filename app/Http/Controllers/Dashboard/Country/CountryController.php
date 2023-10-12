<?php

namespace App\Http\Controllers\Dashboard\Country;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Http\Requests\Country\CreateCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Repositories\Country\CountryRepository;

class CountryController extends Controller
{
    /**
     * @var CountryRepository
     */
    private $countries;

    /**
     * ِCountryController constructor.
     * @param CountryRepository $countries
     */
    public function __construct(CountryRepository $countries)
    {
        $this->countries = $countries;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {

        return view('dashboard.country.index',['countries' =>$this->countries->paginate($perPage = 20, $request->search)]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $edit = false;

        return view('dashboard.country.add-edit', compact('edit'));
    }

    /**
     * @param CreateCountryRequest $request
     * @return mixed
     */

    public function store(CreateCountryRequest $request)
    {
        $data =$request->all();

        $this->countries->create($data);

        return redirect()->route('countries.index')
            ->withSuccess(trans('تمت عملية إنشاء البلد بنجاح'));
    }

    /**
     * @param Country $country
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Country $country)
    {
        $edit = true;

        return view('dashboard.country.add-edit', compact('edit', 'country'));
    }

    /**
     * @param Country $country
     * @param UpdateCountryRequest $request
     * @return mixed
     */
    public function update(Country $country, UpdateCountryRequest $request)
    {
         $data =$request->all();
        $this->countries->update($country->id, $data);

        return redirect()->route('countries.index')
            ->withSuccess(trans('تمت عملية التحديث بنجاح'));
    }


    /**
     * @param Country $country
     */
    public function destroy(Country $country)
    {


    }
}
