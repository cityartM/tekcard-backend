<?php

namespace Modules\Card\Repositories;

use Modules\Card\Models\CardOrder;

interface CardOrderRepository
{
    /**
     * Get all system CardOrder.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all system CardOrder into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Get all system cards with number of users for each card.
     *
     * @return mixed
     */
    public function getAllWithUsersCount();

    /**
     * Find system CardOrder by id.
     *
     * @param $id CardOrder Id
     * @return CardOrder|null
     */
    public function find($id);

    /**
     * Find CardOrder by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new system CardOrder.
     *
     * @param array $data
     * @return CardOrder
     */
    public function create(array $data);


    /**
     * Update specified card.
     *
     * @param $id Card Id
     * @param array $data
     * @return CardOrder
     */
    public function update($id, array $data);

    /**
     * Remove card from repository.
     *
     * @param $id Card Id
     * @return bool
     */
    public function delete($id);

    public function getDatatables();
}
