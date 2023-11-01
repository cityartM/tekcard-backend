<?php

namespace Modules\Tag\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Tag\Models\Tag;


use Modules\Tag\DataTable\TagDatatable;
use DateTime;

class EloquentTag implements TagRepository
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
        return Tag::all();;
    }

    public function index()
    {
        return Tag::all();;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Tag::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $FeedBack= Tag::findOrFail($id);
       

        return $FeedBack->delete();
    }


    public function getDatatables():TagDatatable
    { 
        return new TagDatatable();
    }

    public function store($data)
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $data['name'] = Helper::translateAttribute($data['name'] + ['lang' => $lang]);
       

        return $data;
    }


    public function update($data)
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $data['name'] = Helper::translateAttribute($data['name'] + ['lang' => $lang]);
        return $data;
    }
    

}

