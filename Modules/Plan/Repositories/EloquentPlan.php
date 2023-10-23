<?php

namespace Modules\Plan\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Plan\DataTable\PlanDatatable;
use Modules\Plan\Models\Plan;

class EloquentPlan implements PlanRepository
{

    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return Plan::all();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllWithUsersCount()
    {
        return Plan::withCount('users')->get();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Plan::find($id);
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
        $data['has_dashboard'] = isset($data['has_dashboard']) && $data['has_dashboard'] === "1" ? 1 : 0 ;
        $plan = Plan::create($data);

        return $plan;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $plan = $this->find($id);
        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['display_name'] = Helper::translateAttribute($data['display_name']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();
            $data['display_name'] = Helper::translateAttribute($data['display_name'] + ['lang' => $lang]);
        }

        $data['has_dashboard'] = isset($data['has_dashboard']) && $data['has_dashboard'] === "1" ? 1 : 0 ;

        $plan->update($data);

        return $plan;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $role = $this->find($id);

        return $role->delete();
    }

    /**
     * {@inheritdoc}
     */
    public function updatePermissions($roleId, array $permissions)
    {
        $role = $this->find($roleId);

        $role->syncPermissions($permissions);
    }

    /**
     * {@inheritdoc}
     */
    public function lists($column = 'name', $key = 'id')
    {
        return Plan::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return Plan::where('name', $name)->first();
    }

    public function getDatatables():PlanDatatable
    {
        return new PlanDatatable();
    }
}
