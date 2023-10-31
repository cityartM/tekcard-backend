<?php

namespace Modules\ContactUser\Repositories;

use Modules\ContactUser\Models\UserContact;

interface UserContactRepository
{
    /**
     * Get all system UserContact.
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


    /**
     * @return mixed
     */
    public function getDatatables();


}
