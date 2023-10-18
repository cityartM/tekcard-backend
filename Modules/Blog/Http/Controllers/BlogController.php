<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\Helper;
use Modules\Blog\Models\Blog;
use LaravelLocalization;
use Modules\Blog\Http\Requests\CreateBlogRequest;
use Spatie\MediaLibrary\Models\Media;


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
        $edit= false;
        return view('blog::add-edit' , compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'content', 'tumail', 'type', 'gallery']);
        
        $lang = LaravelLocalization::getCurrentLocale();
        $data['title'] = Helper::translateAttribute($data['title'] + ['lang' => $lang]);
        $data['content'] = Helper::translateAttribute($data['content'] + ['lang' => $lang]);
        
        $blog = Blog::create($data);
        
        if ($request->hasFile('tumail')) {
            // Add the media to the newly created Blog instance
            $blog->addMedia($request->file('tumail'))->toMediaCollection('tumail');
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $blog->addMedia($image)->toMediaCollection('gallery');
            }
        }
        
       
    
        return redirect()->route('blog.index')
        ->with('success', 'Blog entry created successfully'); // Replace 'your.route.name' with the actual route name

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
