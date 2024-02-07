<?php

namespace Modules\Page\Repositories;


use App\Helpers\Helper;
use App\Http\Requests\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use Modules\Page\Models\Page;
use Modules\Page\DataTable\PageDatatable;


class EloquentPage implements PageRepository
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
        return Page::all();;
    }

    public function index()
    {
        return Page::all();
    }

    /**
     * {@inheritdoc}
     */
    public function find($id)
    {
        return Page::find($id);
    }

    /**
     * {@inheritdoc}
     */
    public function delete($id)
    {
        $FeedBack= Page::findOrFail($id);


        return $FeedBack->delete();
    }


    public function getDatatables():PageDatatable
    {
        return new PageDatatable();
    }

    public function create($data)
    {

        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['title'] = Helper::translateAttribute($data['title']);
            $data['short_description'] = Helper::translateAttribute($data['short_description']);
            $data['description'] = Helper::translateAttribute($data['content']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();
            $data['title'] = Helper::translateAttribute($data['title'] + ['lang' => $lang]);
            $data['short_description'] = Helper::translateAttribute($data['short_description'] + ['lang' => $lang]);
            $data['description'] = Helper::translateAttribute($data['description'] + ['lang' => $lang]);
        }

        $page = Page::create($data);

        return $page;
    }


    public function update($id,$data)
    {
        if($this->request->isJson() || $this->request->is('multipart/form-data')){
            $data['title'] = Helper::translateAttribute($data['title']);
            $data['short_description'] = Helper::translateAttribute($data['short_description']);
            $data['description'] = Helper::translateAttribute($data['description']);
        }else{
            $lang = LaravelLocalization::getCurrentLocale();
            $data['title'] = Helper::translateAttribute($data['title'] + ['lang' => $lang]);
            $data['short_description'] = Helper::translateAttribute($data['short_description'] + ['lang' => $lang]);
            $data['description'] = Helper::translateAttribute($data['description'] + ['lang' => $lang]);
        }

        $page = Page::findOrFail($id);
        $page->update($data);
        return $page;
    }





}

