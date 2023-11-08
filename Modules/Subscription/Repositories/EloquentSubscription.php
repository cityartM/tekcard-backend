<?php

namespace Modules\Subscription\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Subscription\Models\Subscription;
use DateTime;

use Modules\Subscription\DataTable\SubscriptionDatatable;

class EloquentSubscription implements SubscriptionRepository
{
 
    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Subscription::all();;
    }

    public function index()
    {
        return Subscription::all();;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Subscription::find($id);
    }

    public function create($data)
    {
        $subscription=Subscription::create($data);
        return $subscription;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $Subscription = Subscription::findOrFail($id);
        $Subscription->delete();

        return $Subscription->delete();
    }


    public function getDatatables():SubscriptionDatatable
    { 
        return new SubscriptionDatatable();
    }



}

