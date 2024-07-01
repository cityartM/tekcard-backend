<?php

namespace Modules\Address\Repositories;

use Modules\Address\Models\Country;

interface CountryRepository
{
    /**
     * Get all system services.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all system services into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Get all system services with number of users for each service.
     *
     * @return mixed
     */
    public function getAllWithUsersCount();

    /**
     * Find system service by id.
     *
     * @param $id Service Id
     * @return Offer|null
     */
    public function find($id);

    /**
     * Find service by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new system service.
     *
     * @param array $data
     * @return Offer
     */
    public function create(array $data);

    /**
     * Update specified service.
     *
     * @param $id Service Id
     * @param array $data
     * @return Offer
     */
    public function update($id, array $data);

    /**
     * Remove service from repository.
     *
     * @param $id Service Id
     * @return bool
     */
    public function delete($id);

    /**
     * @return mixed
     */
    public function getDatatables();

    public function getWilayaDatatables();
}
