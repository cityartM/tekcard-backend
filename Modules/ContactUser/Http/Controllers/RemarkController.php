<?php

namespace Modules\ContactUser\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ContactUser\Models\Remark;

use Illuminate\Support\Facades\Auth;
use Modules\ContactUser\Http\Requests\CreateRemarkRequest; 
use Modules\ContactUser\Repositories\RemarkRepository;

class RemarkController extends Controller
{

    private $remarkUser;

    function __construct(RemarkRepository $remarkUser)
    {
        $this->remarkUser= $remarkUser;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        //dd("it me");
        if ($request->wantsJson()) {
            return $this->remarkUser->getDatatables()->datatables($request);
        }
        return view("contactuser::indexRemark")->with([
            "columns" => $this->remarkUser->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $edit=false;
        return view('contactuser::add-edit-remark',compact("edit"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateRemarkRequest $request)
    {
        $data = $request->only(['title','color']);

        $data['user_id'] = Auth::id();

        Remark::create($data);

        return redirect()->route('remarks.index')->with('success', 'Group created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('contactuser::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $edit=true;
        $remark = Remark::find($id);
        return view('contactuser::add-edit-remark',compact("edit",'remark'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $remark = Remark::find($id);

        if (!$remark) {
            return redirect()->route('remarks.index')->with('error', 'remark not found');
        }
        if ($remark->user_id !== Auth::id()) {
            return redirect()->route('remarks.index')->with('error', 'You are not authorized to update this remark');
        }

        $data = $request->only(['title','color']);

        $remark->update($data);

        return redirect()->route('remarks.index')->with('success', 'remark updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->remarkUser->delete($id);

        return redirect()->route('remarks.index')->with('success', 'remark deleted successfully');
    }
}
