<?php

namespace Modules\ContactUser\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Modules\ContactUser\Http\Requests\CreateGroupRequest; 
use Modules\ContactUser\Repositories\GroupRepository;

use Modules\ContactUser\Models\Group;

class GroupController extends Controller
{
    private $contactUser;

    function __construct(GroupRepository $contactUser)
    {
        $this->contactUser= $contactUser;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        //dd("it me");
        if ($request->wantsJson()) {
            return $this->contactUser->getDatatables()->datatables($request);
        }
        return view("contactuser::indexGroup")->with([
            "columns" => $this->contactUser->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    { 
        $edit=false;
        return view('contactuser::add-edit-group',compact("edit"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateGroupRequest $request)
    {
        $data = $request->only(['display_name']);

        $data['user_id'] = Auth::id();

        Group::create($data);

        return redirect()->route('groups.index')->with('success', 'Group created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $group = Group::find($id);
        return view('contactuser::add-edit-group',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $edit=true;
        $group = Group::find($id);
        return view('contactuser::add-edit-group',compact("edit",'group'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $group = Group::find($id);

        if (!$group) {
            return redirect()->route('groups.index')->with('error', 'Group not found');
        }
        if ($group->user_id !== Auth::id()) {
            return redirect()->route('groups.index')->with('error', 'You are not authorized to update this group');
        }

        $data = $request->only(['display_name']);
        
        $group->update($data);

        return redirect()->route('groups.index')->with('success', 'Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->contactUser->delete($id);

        return redirect()->route('groups.index')->with('success', 'Group deleted successfully');
    }
}
 