<?php

namespace Modules\Tag\Repositories;

use Modules\Tag\Models\Tag;

interface TagRepository
{
    /**
     * Get all system Tag.
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
