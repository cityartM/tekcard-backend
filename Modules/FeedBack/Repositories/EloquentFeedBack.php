<?php

namespace Modules\FeedBack\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\FeedBack\Models\FeedBack;

use Modules\FeedBack\DataTable\FeedBackDatatable;
use DateTime;

class EloquentFeedBack implements FeedBackRepository
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
        return FeedBack::all();;
    }

    public function index()
    {
        return FeedBack::all();;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return FeedBack::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function create($data)
    {
        $feedBack=FeedBack::create($data);
        return $feedBack;
    }


    public function delete($id)
    {
        $FeedBack= FeedBack::findOrFail($id);
       

        return $FeedBack->delete();
    }


    public function getDatatables():FeedBackDatatable
    { 
        return new FeedBackDatatable();
    }



}

