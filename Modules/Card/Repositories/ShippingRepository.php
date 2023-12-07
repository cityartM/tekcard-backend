<?php

namespace Modules\Card\Repositories;

use Modules\Card\Models\Shipping;

interface ShippingRepository
{
    /**
     * Get all system Shipping.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all system Shipping into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Get all system Shipping with number of users for each card.
     *
     * @return mixed
     */
    public function getAllWithUsersCount();

    /**
     * Find system Shipping by id.
     *
     * @param $id Shipping Id
     * @return Shipping|null
     */
    public function find($id);

    /**
     * Find Shipping by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new system Shipping.
     *
     * @param array $data
     * @return Shipping
     */
    public function create(array $data);


    /**
     * Update specified Shipping.
     *
     * @param $id Shipping Id
     * @param array $data
     * @return Shipping
     */
    public function update($id, array $data);

    /**
     * Remove Shipping from repository.
     *
     * @param $id Shipping Id
     * @return bool
     */
    public function delete($id);

    public function getDatatables();
}
