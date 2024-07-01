<?php

namespace Modules\Address\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Address\DataTable\CountryDatatable;
use Modules\Address\DataTable\WilayaDatatable;
use Modules\Address\Models\Country;

class EloquentCountry implements CountryRepository
{

    protected $request;
    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Country::all();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllWithUsersCount()
    {
        return Country::withCount('users')->get();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Country::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['name'] = Helper::translateAttribute($data['name']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();

            $data['name'] = Helper::translateAttribute($data['name'] + ['lang' => $lang]);
        }

        $country = Country::create($data);

        return $country;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $country = $this->find($id);

        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['name'] = Helper::translateAttribute($data['name']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();

            $data['name'] = Helper::translateAttribute($data['name'] + ['lang' => $lang]);
        }

        $country->update($data);

        return $country;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $country = $this->find($id);

        return $country->delete();
    }


    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return Country::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return Country::where('name', $name)->first();
    }

    public function getDatatables()
    {
        return new CountryDatatable();
    }

    public function getWilayaDatatables()
    {
        return new WilayaDatatable();
    }
}
