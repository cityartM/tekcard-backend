<?php

namespace Modules\Card\Repositories;

use Modules\Card\Models\Card;

interface CardRepository
{
    /**
     * Get all system cards.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all system cards into $key => $column value pairs.
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
     * Find system card by id.
     *
     * @param $id Card Id
     * @return Card|null
     */
    public function find($id);

    /**
     * Find card by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new system card.
     *
     * @param array $data
     * @return Card
     */
    public function create(array $data);


    /**
     * Update specified card.
     *
     * @param $id Card Id
     * @param array $data
     * @return Card
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
