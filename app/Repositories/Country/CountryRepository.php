<?php

namespace App\Repositories\Country;

interface CountryRepository
{
    /**
     * Create $key => $value array for all available countries.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name_en', $key = 'id');

    /**
     * Get all available countries.
     * @return mixed
     */
    public function all();

    /**
     * {@inheritdoc}
     */
    public function create(array $data);

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data);

    /**
     * {@inheritdoc}
     */
    public function delete($id);
    /**
     * @param $perPage
     * @param null $search
     * @return mixed
     */
    public function paginate($perPage, $search = null);
}
