<?php

namespace Modules\ContactUser\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

use Modules\ContactUser\Http\Requests\CreateUserContactRequest; 
use Modules\ContactUser\Repositories\UserContactRepository;

use Modules\ContactUser\Models\UserContact;

class UserContactController extends Controller
{

    private $userContact;

    function __construct(UserContactRepository $userContact)
    {
        $this->userContact= $userContact;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
       //dd("it me");
       if ($request->wantsJson()) {
        return $this->userContact->getDatatables()->datatables($request);
    }
        return view("contactuser::index-user-contacts")->with([
            "columns" => $this->userContact->getDatatables()::columns(),
        ]);
    
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('contactuser::create');
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
        return view('contactuser::show');
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
        $this->userContact->delete($id);

        return redirect()->route('userContacts.index')->with('success', 'user contacts deleted successfully');
    }
}
