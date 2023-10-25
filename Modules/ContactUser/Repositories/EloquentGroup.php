<?php

namespace Modules\ContactUser\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\ContactUser\DataTable\GroupDatatable;
use Modules\ContactUser\Models\Group;
use DateTime;

class EloquentGroup implements GroupRepository
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
        return Group::all();
    }

    public function index()
    {
        return Group::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Group::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $Group= Group::findOrFail($id);


        return $Group->delete();
    }

    public function getDatatables():GroupDatatable
    { 
        return new GroupDatatable();
    }





}

