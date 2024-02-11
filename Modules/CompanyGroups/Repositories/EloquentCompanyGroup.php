<?php

namespace Modules\CompanyGroups\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\CompanyGroups\DataTable\CompanyGroupDatatable;
use Modules\CompanyGroups\Models\CompanyGroup;
use DateTime;

class EloquentCompanyGroup implements CompanyGroupRepository
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
        return CompanyGroup::all();
    }

    public function index()
    {
        return CompanyGroup::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return CompanyGroup::find($id);
    }

    /*
     * {@inheritdoc}
     */
    public function create($data)
    {
        $group = CompanyGroup::create($data);
        return $group;
    }


    public function update($id, $data)
    {
        $group = CompanyGroup::findOrFail($id);
        $group->update($data);
        return $group;
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $Group= CompanyGroup::findOrFail($id);


        return $Group->delete();
    }

    public function getDatatables():CompanyGroupDatatable
    {
        return new CompanyGroupDatatable();
    }





}

