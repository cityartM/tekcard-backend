<?php

namespace Modules\Card\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\Request;
use App\Support\Enum\UserStatus;
use App\Models\User;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Card\Models\CardOrder;
use Modules\Card\DataTable\CardOrderDatatable;

class EloquentCardOrder implements CardOrderRepository
{

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return CardOrder::all();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllWithUsersCount()
    {
        return CardOrder::withCount('users')->get();
    }


    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return CardOrder::findOrFail($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data): CardOrder
    {
        $card = CardOrder::create($data);

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
            $card = CardOrder::findOrFail($id);

            return $card->delete();
        }



    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return CardOrder::pluck($column, $key);
    }

    /**
     * @param $name
     * @param $lang
     * @return CardOrder|mixed
     */
    public function findByName($name)
    {
        return CardOrder::where('name', $name)->first();
    }

    public function getDatatables():CardOrderDatatable
    {
        return new CardOrderDatatable();
    }



}

