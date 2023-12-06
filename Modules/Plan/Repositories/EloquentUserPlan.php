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
            $data['bio'] = Helper::translateAttribute($data['bio']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();
            $data['bio'] = Helper::translateAttribute($data['bio'] + ['lang' => $lang]);
        }

        $userPlan = UserPlan::create($data);

        return $userPlan;
    }


}
