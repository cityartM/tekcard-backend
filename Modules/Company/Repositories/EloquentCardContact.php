<?php

namespace Modules\Company\Repositories;

use Modules\Company\Models\CardContact;

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


    public function countUserPeoples($id)
    {
        return CardContact::where('user_id',$id)->where('group','Peoples')->count();
    }


    public function countUserWorks($id)
    {
        return CardContact::where('user_id',$id)->where('group','Works')->count();
    }

    public function getDatatables():CardDatatable
    {
        return new CardDatatable();
    }


    public function checkExistCard($card_id,$user_id)
    {
        return CardContact::where('card_id',$card_id)->where('user_id',$user_id)->first();
    }
}
