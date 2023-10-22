<?php

namespace Modules\Blog\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Blog\Models\Blog;


use Modules\Blog\DataTable\BlogDatatable;
use DateTime;

class EloquentBlog implements BlogRepository
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
        return Blog::all();;
    }

    public function index()
    {
        return Blog::all();;
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Blog::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $FeedBack= Blog::findOrFail($id);
       

        return $FeedBack->delete();
    }


    public function getDatatables():BlogDatatable
    { 
        return new BlogDatatable();
    }

    public function store($data)
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $data['title'] = Helper::translateAttribute($data['title'] + ['lang' => $lang]);
        $data['content'] = Helper::translateAttribute($data['content'] + ['lang' => $lang]);
       

        return $data;
    }


    public function update($data)
    {
        $lang = LaravelLocalization::getCurrentLocale();
        $data['title'] = Helper::translateAttribute($data['title'] + ['lang' => $lang]);
        $data['content'] = Helper::translateAttribute($data['content'] + ['lang' => $lang]);
       

        return $data;
    }
    

}

