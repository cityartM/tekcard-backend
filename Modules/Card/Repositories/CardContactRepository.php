<?php

namespace Modules\Card\Repositories;

use Modules\Card\Models\CardContact;

interface CardContactRepository
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



    public function getDatatables();
}
