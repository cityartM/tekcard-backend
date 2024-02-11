<?php

namespace Modules\CompanyGroups\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Modules\CompanyGroups\Http\Requests\CreateGroupRequest; 
use Modules\CompanyGroups\Repositories\CompanyGroupRepository;

use Modules\CompanyGroups\Models\CompanyGroup;

class CompanyGroupsController extends Controller
{
    private $group;

    function __construct(CompanyGroupRepository $group)
    {
        $this->group= $group;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        //dd("it me");
        if ($request->wantsJson()) {
            return $this->group->getDatatables()->datatables($request);
        }
        return view("companygroups::indexGroup")->with([
            "columns" => $this->group->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    { 
        $edit=false;
        return view('companygroups::add-edit-group',compact("edit"));
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

        $user = Auth::user();

        // Access the company_id from the user's company relationship
        $data['company_id'] = $user->company_id;

       // dd($data['company_id']);

        CompanyGroup::create($data);

        return redirect()->route('companygroups.index')->with('success', 'Group created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $group = CompanyGroup::find($id);
        return view('companygroups::add-edit-group',compact('group'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $edit=true;
        $group = CompanyGroup::find($id);
        return view('companygroups::add-edit-group',compact("edit",'group'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $group = CompanyGroup::find($id);

        if (!$group) {
            return redirect()->route('companygroups.index')->with('error', 'Group not found');
        }
        if ($group->user_id !== Auth::id()) {
            return redirect()->route('companygroups.index')->with('error', 'You are not authorized to update this group');
        }

        $data = $request->only(['display_name']);
        
        $group->update($data);

        return redirect()->route('companygroups.index')->with('success', 'Group updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->group->delete($id);

        return redirect()->route('companygroups.index')->with('success', 'Group deleted successfully');
    }
}
 