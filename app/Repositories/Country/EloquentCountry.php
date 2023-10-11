<?php

namespace App\Repositories\Country;

use App\Country;
use App\Http\Filters\CountryKeywordSearch;

class EloquentCountry implements CountryRepository
{
    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name_en', $key = 'id')
    {
        return Country::orderBy('name_en')->pluck($column, $key);
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
    public function find($id)
    {
        return Country::find($id);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        $country = Country::create($data);


        return $country;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $country = $this->find($id);

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
     * @param $perPage
     * @param null $search
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginate($perPage, $search = null)
    {
        $query = Country::query();


        if ($search) {
            (new CountryKeywordSearch)($query, $search);
        }

        $result = $query->orderBy('id', 'asc')
            ->paginate($perPage);

        if ($search) {
            $result->appends(['search' => $search]);
        }


        return $result;
    }
}
