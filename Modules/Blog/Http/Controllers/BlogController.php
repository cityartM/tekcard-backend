<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\Helper;
use Illuminate\Support\Facades\File;
use Modules\Blog\Models\Blog;
use Modules\Tag\Models\Tag;
use LaravelLocalization;
use Modules\Blog\Http\Requests\CreateBlogRequest;
use Spatie\MediaLibrary\Models\Media;

use Modules\Blog\Repositories\BlogRepository;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */


     private $blogs;

    function __construct(BlogRepository $blogs)
    {
        $this->blogs= $blogs;
    }


    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->blogs->getDatatables()->datatables($request);
        }
        return view("blog::index")->with([
            "columns" => $this->blogs->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $tags = Tag::pluck('name', 'id');
        $edit= false;
        return view('blog::add-edit' , compact('edit','tags'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->only(['title', 'content','text','status']);
        $transformedArray = array_map(function ($tag_id) {
            return ['tag_id' => $tag_id];
        }, $request->tag_ids);

        $data['tag_ids'] = $transformedArray;
        $blog = $this->blogs->create($data);

        if ($request->hasFile('thumbnail')) {
            $blog->addMedia($request->file('thumbnail'))->toMediaCollection('thumbnail');
        }
        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $blog->addMedia($image)->toMediaCollection('gallery');
            }
        }

        return redirect()->route('blogs.index')
        ->with('success', 'Blog entry created successfully'); // Replace 'your.route.name' with the actual route name

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $blog=Blog::find($id);

        return view('blog::add-edit' , compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */

     public function edit(Blog $blog)
     {
         $edit= true;
         return view('blog::add-edit', compact('edit','blog'));
     }

    public function all()
    {
        $blog=Blog::all();

        return view('blog::add-edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Blog $blog)
    {
        $data = $request->only(['title', 'content','text','status']);
        $transformedArray = array_map(function ($tag_id) {
            return ['tag_id' => $tag_id];
        }, $request->tag_ids);

        $data['tag_ids'] = $transformedArray;
        $blog = $this->blogs->update($blog->id,$data);

        if ($request->hasFile('thumbnail')) {
            // Update the 'tumail' media for the Blog instance
            $blog->clearMediaCollection('thumbnail'); // Remove existing media
            $blog->addMedia($request->file('thumbnail'))->toMediaCollection('thumbnail');
        }

        if ($request->hasFile('gallery')) {
            // Update the 'gallery' media for the Blog instance
            $blog->clearMediaCollection('gallery'); // Remove existing media
            foreach ($request->file('gallery') as $image) {
                $blog->addMedia($image)->toMediaCollection('gallery');
            }
        }

        return redirect()->route('blogs.index')
            ->with('success', 'Blog entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $blog = Blog::find($id);

        if (!$blog) {
            return redirect()->route('blogs.index')
                ->with('error', 'Blog entry not found');
        }

        // Delete the associated media files from the media library
        $blog->clearMediaCollection('tumail'); // Clear 'tumail' media
        $blog->clearMediaCollection('gallery'); // Clear 'gallery' media

        // Delete the blog entry
        $blog->delete();
        return redirect()->route('blogs.index')->with('success', 'Blog entry deleted successfully');
    }
}
