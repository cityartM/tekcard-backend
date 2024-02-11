<?php

namespace Modules\CompanyGroups\Repositories;



interface CompanyGroupRepository
{
    /**
     * Get all system Group.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all();

    public function index();

    public function create($data);

    public function update($id, $data);

    public function delete($id);


    /**
     * @return mixed
     */
    public function getDatatables();


}
