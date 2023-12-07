<?php

namespace Modules\ContactUs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Http\Controllers\Api\ApiController;
use Modules\ContactUs\Models\ContactUs;
use Modules\ContactUs\Http\Resources\ContactUsResource;



use Modules\ContactUs\Http\Requests\CreateContactUsRequest;

use Modules\ContactUs\Repositories\ContactUsRepository;

class ContactUsApiController extends ApiController
{

    function __construct(ContactUsRepository $contactUs)
    {
        $this->contactUs= $contactUs;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('contactus::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('contactus::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateContactUsRequest $request)
    {
        $validatedData = $request->only(['name','company','email','subject','message']);

        $validatedData['full_name'] = $validatedData['name'];
        unset($validatedData['name']);

        $contactus=$this->contactUs->create($validatedData);

        return $this->respondWithSuccess([
            'card' => new ContactUsResource($contactus),
        ], 'Card created successfully', 200);


    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('contactus::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('contactus::edit');
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
