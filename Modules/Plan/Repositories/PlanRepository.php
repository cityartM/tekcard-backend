<?php

namespace Modules\Plan\Repositories;

use Modules\Plan\Models\Plan;

interface PlanRepository
{
    /**
     * Get all system plans.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all system plans into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Get all system plans with number of users for each plan.
     *
     * @return mixed
     */
    public function getAllWithUsersCount();

    /**
     * Find system plan by id.
     *
     * @param $id Plan Id
     * @return Plan|null
     */
    public function find($id);

    /**
     * Find plan by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new system plan.
     *
     * @param array $data
     * @return Plan
     */
    public function create(array $data);

    /**
     * Update specified plan.
     *
     * @param $id Plan Id
     * @param array $data
     * @return Plan
     */
    public function update($id, array $data);

    /**
     * Remove plan from repository.
     *
     * @param $id Plan Id
     * @return bool
     */
    public function delete($id);

    /**
     * Update the permissions for given plan.
     *
     * @param $planId
     * @param array $permissions
     * @return mixed
     */
    public function updatePermissions($planId, array $permissions);

    /**
     * @return mixed
     */
    public function getDatatables();
}
