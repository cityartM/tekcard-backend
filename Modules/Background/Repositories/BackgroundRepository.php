<?php

namespace Modules\Background\Repositories;

use Modules\Background\Models\Background;

interface BackgroundRepository
{
    /**
     * Get all system Background.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();


    public function index();



    /**
     * Remove Subscription from repository.
     *
     * @param $id Subscription Id
     * @return bool
     */
    public function delete($id);

    public function getDatatables();

    public function store($data);

    public function update($data);

}
