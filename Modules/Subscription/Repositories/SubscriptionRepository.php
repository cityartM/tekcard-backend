<?php

namespace Modules\Subscription\Repositories;

use Modules\Subscription\Models\Subscription;

interface SubscriptionRepository
{
    /** 
     * Get all system Subscriptions.
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

    public function create($data);
 
    public function getDatatables();

}
