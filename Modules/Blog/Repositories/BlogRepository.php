<?php

namespace Modules\Blog\Repositories;

use Modules\Blog\Models\Blog;

interface BlogRepository
{
    /** 
     * Get all system Blog.
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
