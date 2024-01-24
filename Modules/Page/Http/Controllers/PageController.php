<?php

namespace Modules\Page\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\Helper;
use Illuminate\Support\Facades\File;
use Modules\Page\Models\Page;
use Modules\Tag\Models\Tag;
use LaravelLocalization;
use Modules\Page\Http\Requests\CreatePageRequest;
use Spatie\MediaLibrary\Models\Media;

use Modules\Page\Repositories\PageRepository;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */


     private $pages;

    function __construct(PageRepository $pages)
    {
        $this->pages= $pages;
    }


    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->pages->getDatatables()->datatables($request);
        }
        return view("page::index")->with([
            "columns" => $this->pages->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $edit= false;
        return view('page::add-edit' , compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
    $data = $request->only(['title', 'short_description','description',/*'type'*/]);
       

        $pages = $this->pages->create($data);

       

        return redirect()->route('pages.index')
        ->with('success', 'pages entry created successfully'); // Replace 'your.route.name' with the actual route name

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */

     public function edit(Page $page)
     {
         $edit= true;
         return view('page::add-edit', compact('edit','page'));
     }

    public function all()
    {
        $page=Page::all();

        return view('page::add-edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, Page $page)
    {
        $data = $request->only(['title', 'short_description','description',/*'type'*/]);

        $page = $this->pages->update($page->id,$data);

        if ($request->hasFile('thumbnail')) {
            // Update the 'tumail' media for the instance
            $page->clearMediaCollection('thumbnail'); // Remove existing media
            $page->addMedia($request->file('thumbnail'))->toMediaCollection('thumbnail');
        }

        return redirect()->route('pages.index')
            ->with('success', 'pages entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {

        $page = Page::find($id);

        if (!$page) {
            return redirect()->route('pages.index')
                ->with('error', 'pages entry not found');
        }

      

        // Delete the pages entry
        $page->delete();
        return redirect()->route('pages.index')->with('success', 'pages entry deleted successfully');
    }
}
