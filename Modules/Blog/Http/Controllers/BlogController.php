<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\Helper;
use Modules\Blog\Models\Blog;
use LaravelLocalization;
use Modules\Blog\Http\Requests\CreateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('blog::index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('blog::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateBlogRequest $request)
    {
        $data = $request->only(['title','content','tumail','type','gallery']);

        if ($request->isJson() || $request->is('multipart/form-data')) {
            // If the request is JSON or multipart form-data, translate 'title' and 'content'
            foreach ($data['title'] as $key => $value) {
                $data['title'][$key] = Helper::translateAttribute($value);
            }
            foreach ($data['content'] as $key => $value) {
                $data['content'][$key] = Helper::translateAttribute($value);
            }
        } else {
            // If not JSON or multipart form-data, get the current locale and translate
            $lang = LaravelLocalization::getCurrentLocale();
            foreach ($data['title'] as $key => $value) {
                $data['title'][$key] = Helper::translateAttribute($value + ['lang' => $lang]);
            }
            foreach ($data['content'] as $key => $value) {
                $data['content'][$key] = Helper::translateAttribute($value + ['lang' => $lang]);
            }
        }

        if ($request->hasFile('tumail')) {
            $image = $request->file('tumail');
            $media = $blog->addMedia($image)->toMediaCollection('tumail');
            // Associate the media item with the Blog model
            $data['tumail'] = $media->getUrl(); 
        }


        $blog = Blog::create($data);


        return response()->json($blog, 201); 
    


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('blog::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('blog::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
