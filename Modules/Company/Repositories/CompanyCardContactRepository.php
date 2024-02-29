<?php

namespace Modules\Company\Repositories;

use Modules\Company\Models\CompanyCardContact;

interface CompanyCardContactRepository
{
    /**
     * {@inheritdoc}
     */
    public function all();


    /**
     * {@inheritdoc}
     */
    public function find($id);


    /**
     * {@inheritdoc}
     */
    public function create(array $data);



    /**
     * {@inheritdoc}
     */
    public function update($id, array $data);


    /**
     * {@inheritdoc}
     */
    public function delete($id);


}
