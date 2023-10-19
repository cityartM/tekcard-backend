<?php

namespace Modules\ContactUs\Repositories;

use Modules\ContactUs\Models\ContactUs;

interface ContactUsRepository
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


    /**
     * @return mixed
     */
    public function getDatatables();


}
