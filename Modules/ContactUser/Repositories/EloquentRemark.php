<?php

namespace Modules\ContactUser\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\ContactUser\DataTable\RemarkDatatable;
use Modules\ContactUser\Models\Remark;
use DateTime;

class EloquentRemark implements RemarkRepository
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
        return Remark::all();
    }

    public function index()
    {
        return Remark::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Remark::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $Remark= Remark::findOrFail($id);


        return $Remark->delete();
    }

    public function getDatatables():RemarkDatatable
    { 
        return new RemarkDatatable();
    }





}

