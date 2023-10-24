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
 
use Modules\Blog\Repositories\BlogRepository;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */


     private $blog;

    function __construct(BlogRepository $blog)
    {
        $this->blog= $blog;
    } 


    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->blog->getDatatables()->datatables($request);
        }
        return view("blog::index")->with([
            "columns" => $this->blog->getDatatables()::columns(),
        ]);
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
        $data = $request->only(['title', 'content', 'status' ,'tumail', 'type', 'gallery']);
        

        $datat=$this->blog->store($data);

       
        
        $blog = Blog::create($datat);

        if ($request->hasFile('tumail')) {
            // Add the media to the newly created Blog instance
            $blog->addMedia($request->file('tumail'))->toMediaCollection('tumail');
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
        return view('blog::add-edit' , compact('edit'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $blog=Blog::find($id);
        $edit= true;
        return view('blog::add-edit', compact('edit','blog'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->only(['title', 'content', 'status', 'tumail', 'type', 'gallery']);

        $datat=$this->blog->store($data);

        $blog=Blog::find($id);
        $blog->update($datat);
    
        if ($request->hasFile('tumail')) {
            // Update the 'tumail' media for the Blog instance
            $blog->clearMediaCollection('tumail'); // Remove existing media
            $blog->addMedia($request->file('tumail'))->toMediaCollection('tumail');
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
