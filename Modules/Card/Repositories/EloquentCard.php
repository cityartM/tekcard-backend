<?php

namespace Modules\Card\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\Request;
use App\Support\Enum\UserStatus;
use App\Models\User;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Card\Models\Card;
use Modules\Card\DataTable\CardDatatable;

class EloquentCard implements CardRepository
{

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Card::all();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllWithUsersCount()
    {
        return Card::withCount('users')->get();
    }


    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Card::findOrFail($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data): Card
    {
        $card = Card::create($data);

        return $card;
    }


    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $card = $this->find($id);

        $card->update($data);

        return $card;
    }


    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $card = $this->find($id);

        return $card->delete();
    }



    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return Card::pluck($column, $key);
    }

    /**
     * @param $name
     * @param $lang
     * @return Card|mixed
     */
    public function findByName($name)
    {
        return Card::where('name', $name)->first();
    }

    public function getDatatables():CardDatatable
    {
        return new CardDatatable();
    }



}

