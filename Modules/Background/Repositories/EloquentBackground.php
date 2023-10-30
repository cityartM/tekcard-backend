<?php

namespace Modules\Background\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Background\Models\Background;


use Modules\Background\DataTable\BackgroundDatatable;
use DateTime;

class EloquentBackground implements BackgroundRepository
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
        return Background::all();;
    }

    public function index()
    {
        return Background::all();;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Background::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $FeedBack= Background::findOrFail($id);
       

        return $FeedBack->delete();
    }


    public function getDatatables():BackgroundDatatable
    { 
        return new BackgroundDatatable();
    }

    public function store($data)
    {
       
    }


    public function update($data)
    {
       
    }
    

}

