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

  

    /**
     * Remove Subscription from repository.
     *
     * @param $id Subscription Id
     * @return bool
     */
    public function delete($id);


}
