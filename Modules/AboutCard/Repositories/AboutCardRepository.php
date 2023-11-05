<?php

namespace Modules\AboutCard\Repositories;

use Modules\AboutCard\Models\AboutCard;

interface AboutCardRepository
{
    /**
     * Get all system AboutCard.
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
