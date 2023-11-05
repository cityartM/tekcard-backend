<?php

namespace Modules\Card\Repositories;

use Modules\Card\Models\CardContact;

class EloquentCardContact implements CardContactRepository
{
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return CardContact::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return CardContact::findOrFail($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data): CardContact
    {
        $cardContact = CardContact::create($data);

        return $cardContact;
    }


    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $cardContact = $this->find($id);

        $cardContact->update($data);

        return $cardContact;
    }


    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $cardContact = $this->find($id);

        return $cardContact->delete();
    }




    public function getDatatables():CardDatatable
    {
        return new CardDatatable();
    }
}
