<?php

namespace Modules\Feature\Repositories;

use Modules\Feature\Models\Feature;

interface FeatureRepository
{
    /**
     * Get all system features.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    /**
     * Lists all system features into $key => $column value pairs.
     *
     * @param string $column
     * @param string $key
     * @return mixed
     */
    public function lists($column = 'name', $key = 'id');

    /**
     * Get all system features with number of users for each feature.
     *
     * @return mixed
     */
    public function getAllWithUsersCount();

    /**
     * Find system feature by id.
     *
     * @param $id Feature Id
     * @return Feature|null
     */
    public function find($id);

    /**
     * Find feature by name:
     *
     * @param $name
     * @return mixed
     */
    public function findByName($name);

    /**
     * Create new system feature.
     *
     * @param array $data
     * @return Feature
     */
    public function create(array $data);

    /**
     * Update specified feature.
     *
     * @param $id Feature Id
     * @param array $data
     * @return Feature
     */
    public function update($id, array $data);

    /**
     * Remove feature from repository.
     *
     * @param $id Feature Id
     * @return bool
     */
    public function delete($id);

    /**
     * Update the permissions for given feature.
     *
     * @param $featureId
     * @param array $features
     * @return mixed
     */
    public function updateFeatures($featureId, array $features);

    /**
     * @return mixed
     */
    public function getDatatables();
}
