<?php

namespace Modules\Blog\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Blog\Models\Blog;
use Modules\Blog\DataTable\BlogDatatable;


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
        return Blog::all();
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

    public function create($data)
    {

        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['title'] = Helper::translateAttribute($data['title']);
            $data['text'] = Helper::translateAttribute($data['text']);
            $data['content'] = Helper::translateAttribute($data['content']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();
            $data['title'] = Helper::translateAttribute($data['title'] + ['lang' => $lang]);
            $data['text'] = Helper::translateAttribute($data['text'] + ['lang' => $lang]);
            $data['content'] = Helper::translateAttribute($data['content'] + ['lang' => $lang]);
        }

        $blog = Blog::create($data);

        return $blog;
    }


    public function update($id,$data)
    {
        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['title'] = Helper::translateAttribute($data['title']);
            $data['text'] = Helper::translateAttribute($data['text']);
            $data['content'] = Helper::translateAttribute($data['content']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();
            $data['title'] = Helper::translateAttribute($data['title'] + ['lang' => $lang]);
            $data['text'] = Helper::translateAttribute($data['text'] + ['lang' => $lang]);
            $data['content'] = Helper::translateAttribute($data['content'] + ['lang' => $lang]);
        }

        $blog = Blog::findOrFail($id);
        $blog->update($data);
        return $blog;
    }





}

