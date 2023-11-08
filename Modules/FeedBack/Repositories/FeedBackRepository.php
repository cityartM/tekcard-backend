<?php

namespace Modules\FeedBack\Repositories;

use Modules\FeedBack\Models\FeedBack;

interface FeedBackRepository
{
    /** 
     * Get all system ContactUs.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();
    

    public function index();

    public function create($data);

    /**
     * Remove Subscription from repository.
     *
     * @param $id Subscription Id
     * @return bool
     */
    public function delete($id);

    public function getDatatables();


}
