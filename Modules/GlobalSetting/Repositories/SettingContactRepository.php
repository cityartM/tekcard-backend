<?php

namespace Modules\GlobalSetting\Repositories;



interface SettingContactRepository
{
    /**
     * Get all system SettingContact
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
