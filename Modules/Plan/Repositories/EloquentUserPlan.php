<?php

namespace Modules\Plan\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Plan\DataTable\PlanDatatable;
use Modules\Plan\Models\UserPlan;

class EloquentUserPlan implements UserPlanRepository
{

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return UserPlan::all();
    }


    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        $userPlan = UserPlan::create($data);

        return $userPlan;
    }


}
