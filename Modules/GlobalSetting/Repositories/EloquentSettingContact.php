<?php

namespace Modules\GlobalSetting\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\GlobalSetting\DataTable\SettingContactDatatable;
use Modules\GlobalSetting\Models\SettingContact;
use DateTime;

class EloquentSettingContact implements SettingContactRepository
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
        return SettingContact::all();
    }

    public function index()
    {
        return SettingContact::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return SettingContact::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $SettingContact= SettingContact::findOrFail($id);

        return $SettingContact->delete();
    }

    public function getDatatables():SettingContactDatatable
    { 
        return new SettingContactDatatable();
    }





}

