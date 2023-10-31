<?php

namespace Modules\Background\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Background\Repositories\BackgroundRepository;
use Modules\Background\Http\Requests\CreateBackgroundRequest;

use Modules\Background\Models\Background;


class BackgroundController extends Controller
{


    private $background;

    function __construct(BackgroundRepository $background)
    {
        $this->background= $background;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $background = Background::where('type', 'Share')->first();
        dd($background->getFirstMediaUrl('background'));
        if ($request->wantsJson()) {
            return $this->background->getDatatables()->datatables($request);
        }
        return view("background::index")->with([
            "columns" => $this->background->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $edit= false;
        return view('background::add-edit' , compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateBackgroundRequest $request)
    {
        $data = $request->only(['type']);

        $background = Background::create($data);

        if ($request->hasFile('image')) {
            $background->addMedia($request->file('image'))->toMediaCollection('background');
        }

        return redirect()->route('backgrounds.index')
        ->with('success', 'background created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('background::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $background = Background::find($id);
        $edit= true;
        return view('background::add-edit', compact('edit','background'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreateBackgroundRequest $request, $id)
    {
        $data = $request->only(['type']);

        $background=Background::find($id);

        $background->update($data);

        if ($request->hasFile('image')) {
            $background->clearMediaCollection('background'); // Remove existing media
            $background->addMedia($request->file('image'))->toMediaCollection('background');
        }

        return redirect()->route('backgrounds.index')
            ->with('success', 'background updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $background = Background::find($id);

        if (!$background) {
            return redirect()->route('backgrounds.index')
                ->with('error', 'Blog entry not found');
        }

        $background->clearMediaCollection('background'); // Clear 'tumail' media

        // Delete the blog entry
        $background->delete();
        return redirect()->route('blogs.index')->with('success', 'background deleted successfully');
    }
}
