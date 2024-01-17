<?php

namespace Modules\Card\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\Request;
use App\Support\Enum\UserStatus;
use App\Models\User;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Card\Models\Shipping;
use Modules\Card\DataTable\ShippingDatatable;

class EloquentShipping implements ShippingRepository
{

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Shipping::all();
    }


    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Shipping::findOrFail($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create(array $data): Shipping
    {
        $shipping = Shipping::create($data);

        return $shipping;
    }


    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $shipping = $this->find($id);

        $shipping->update($data);

        return $shipping;
    }


    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $shipping = $this->find($id);

        return $shipping->delete();
    }




    public function getDatatables():ShippingDatatable
    {
        return new ShippingDatatable();
    }



}

