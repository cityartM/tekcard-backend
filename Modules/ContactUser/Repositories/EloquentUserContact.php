<?php

namespace Modules\ContactUser\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\ContactUser\DataTable\UserContactDatatable;
use Modules\ContactUser\Models\UserContact;
use DateTime;

class EloquentUserContact implements UserContactRepository
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
        return UserContact::all();
    }

    public function index()
    {
        return UserContact::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return UserContact::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $userContact= UserContact::findOrFail($id);


        return $userContact->delete();
    }

    public function getDatatables():UserContactDatatable
    { 
        return new UserContactDatatable();
    }





}

