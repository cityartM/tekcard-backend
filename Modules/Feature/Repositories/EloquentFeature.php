<?php

namespace Modules\Feature\Repositories;

use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Feature\DataTable\FeatureDatatable;
use Modules\Feature\Models\Feature;

class EloquentFeature implements FeatureRepository
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
        return Feature::all();
    }

    /**
     * {@inheritdoc}
     */
    public function getAllWithUsersCount()
    {
        return Feature::withCount('users')->get();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Feature::find($id);
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
        $feature = Feature::create($data);

        return $feature;
    }

    /**
     * {@inheritdoc}
     */
    public function update($id, array $data)
    {
        $feature = $this->find($id);
        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['display_name'] = Helper::translateAttribute($data['display_name']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();
            $data['display_name'] = Helper::translateAttribute($data['display_name'] + ['lang' => $lang]);
        }

        $data['has_dashboard'] = isset($data['has_dashboard']) && $data['has_dashboard'] === "1" ? 1 : 0 ;

        $feature->update($data);

        return $feature;
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
        return Feature::pluck($column, $key);
    }

    /**
     * {@inheritdoc}
     */
    public function findByName($name)
    {
        return Feature::where('name', $name)->first();
    }

    public function getDatatables():FeatureDatatable
    {
        return new FeatureDatatable();
    }
}
