<?php

namespace Hoska\Http\Controllers\Api\Countries;

use Hoska\Country;
use Hoska\Http\Controllers\Api\ApiController;
use Hoska\Http\Filters\CountryKeywordSearch;
use Hoska\Http\Requests\Country\CreateCountryRequest;
use Hoska\Http\Requests\Country\UpdateCountryRequest;
use Hoska\Http\Resources\CountryResource;
use Hoska\Repositories\Country\CountryRepository;
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
