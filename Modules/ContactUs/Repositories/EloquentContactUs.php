<?php

namespace Modules\ContactUs\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\ContactUs\DataTable\ContactUsDatatable;
use Modules\ContactUs\Models\ContactUs;
use DateTime;

class EloquentContactUs implements ContactUsRepository
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
        return ContactUs::all();
    }

    public function index()
    {
        return ContactUs::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return ContactUs::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $ContactUs= ContactUs::findOrFail($id);


        return $ContactUs->delete();
    }

    public function getDatatables():ContactUsDatatable
    {
        return new ContactUsDatatable();
    }





}

