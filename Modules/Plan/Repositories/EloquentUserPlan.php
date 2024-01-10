<?php

namespace Modules\Plan\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Plan\DataTable\PlanDatatable;
use Modules\Plan\Models\UserPlan;

class EloquentUserPlan implements UserPlanRepository
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
        return UserPlan::all();
    }


    /**
     * {@inheritdoc}
     */
    public function create(array $data)
    {
        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['display_name'] = Helper::translateAttribute($data['display_name']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();
            $data['display_name'] = Helper::translateAttribute($data['display_name'] + ['lang' => $lang]);
        }

        $userPlan = UserPlan::create($data);

        return $userPlan;
    }


}
