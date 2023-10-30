<?php

namespace Modules\Tag\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Tag\Http\Requests\CreateTagRequest;

use Modules\Tag\Models\Tag;

use Modules\Tag\Repositories\TagRepository;

class TagController extends Controller
{


    private $tag;

    function __construct(TagRepository $tag)
    {
        $this->tag= $tag;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->tag->getDatatables()->datatables($request);
        }
        return view("tag::index")->with([
            "columns" => $this->tag->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $edit= false;
        return view('tag::add-edit' , compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateTagRequest $request)
    {
        $data = $request->only(['name']);

        $datat=$this->tag->store($data);

        $tag = Tag::create($datat);

        
        return redirect()->route('tags.index')
        ->with('success', 'tag created successfully');


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('tag::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $tag=Tag::find($id);
         $edit= true;
         return view('tag::add-edit', compact('edit','tag'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreateTagRequest $request, $id)
    {
        $data = $request->only(['name']);

        $datat=$this->tag->store($data);

        $tag=Tag::find($id);

        $tag->update($datat);

        return redirect()->route('tags.index')
            ->with('success', 'tag entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        if (!$tag) {
            return redirect()->route('tags.index')
                ->with('error', 'tag entry not found');
        }


        // Delete the tag entry
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'tag entry deleted successfully');
    }
}
