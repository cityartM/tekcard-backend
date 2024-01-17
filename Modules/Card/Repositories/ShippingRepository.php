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
     * Find system Shipping by id.
     *
     * @param $id Shipping Id
     * @return Shipping|null
     */
    public function find($id);


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
