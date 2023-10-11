<?php

namespace App\Http\Controllers\Api\Countries;

use App\Models\Country;
use App\Http\Controllers\Api\ApiController;
use App\Http\Filters\CountryKeywordSearch;
use App\Http\Requests\Country\CreateCountryRequest;
use App\Http\Requests\Country\UpdateCountryRequest;
use App\Http\Resources\CountryResource;
use App\Repositories\Country\CountryRepository;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


/**
 * Class CountriesController
 * @package Hoska\Http\Controllers\Api\Countries
 */
class CountriesController extends ApiController
{
    /**
     * @var CountryRepository
     */
    private $countries;

    public function __construct(CountryRepository $countries)
    {
        $this->countries = $countries;
    }

    /**
     * Get list of all available countries.
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {

        $countries = QueryBuilder::for(Country::class)
            ->allowedFilters([
                AllowedFilter::custom('search', new CountryKeywordSearch),
            ])
            ->allowedSorts(['id', 'created_at', 'updated_at'])
            ->defaultSort('id')
            ->get(['id','name_en','name_ar','calling_code','currency','currency_code']);

        return CountryResource::collection($countries);
    }

    /**
     * @param CreateCountryRequest $request
     * @return CountryResource
     */

    public function store(CreateCountryRequest $request)
    {
        $data = $request->only([
            'name_en', 'name_ar', 'calling_code', 'currency', 'currency_code',
        ]);

        $country = $this->countries->create($data);

        return [ 'message' => $this->respondWithSuccessNotArray(),'data' => new CountryResource($country)];
    }

    /**
     * @param Country $country
     * @param UpdateCountryRequest $request
     * @return array
     */

    public function update(Country $country , UpdateCountryRequest $request)
    {
        $data = $request->only([
            'name_en', 'name_ar', 'calling_code', 'currency', 'currency_code',
        ]);

        $country = $this->countries->update($country->id,$data);

        return [ 'message' => $this->respondWithSuccessNotArray(),'data' => new CountryResource($country)];

    }

    /**
     * @param Country $country
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Country $country)
    {
      return $this->errorForbidden();
    }
}
