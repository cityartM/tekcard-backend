<?php

namespace Modules\ContactUser\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\ContactUser\Http\Requests\CreateGroupRequest; 
use Modules\ContactUser\Repositories\GroupRepository;

use Illuminate\Database\Eloquent\Model\Group;

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $group = Group::find($id);
        return view('contactuser::show' , compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('contactuser::edit');
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
