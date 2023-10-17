<?php

namespace Modules\ContactUs\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ContactUs\Models\ContactUs;

use Modules\ContactUs\Http\Requests\CreateContactUsRequest;

use Modules\ContactUs\Repositories\ContactUsRepository;

class ContactUsController extends Controller
{
    private $ContactUs;

    function __construct(ContactUsRepository $ContactUs)
    {
        $this->ContactUs= $ContactUs;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $contacts = $this->ContactUs->all();
        //$contacts = ContactUs::all();

        return view('contactus::index', compact('contacts'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateContactUsRequest $request)
{
    $validatedData = $request->only(['name','company','email','subject','message']);

    $validatedData['full_name'] = $validatedData['name'];
    unset($validatedData['name']);

    ContactUs::create($validatedData);

    return redirect()->back()->with('success', 'Message sent successfully!');
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
    public function update(CreateContactUsRequest $request, $id)
    {
        $validatedData = $request->only(['first_name','last_name','email','message']);

        $contact = ContactUs::find($id);

        if (!$contact) {
            return redirect()->route('contacts.index')->with('error', 'Contact not found');
        }

        $contact->update($validatedData);

        return redirect()->route('contacts.index')->with('success', 'Contact updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
{
    $contacts = $this->ContactUs->delete($id);

    return redirect()->route('contactus.index')->with('success', 'Contact deleted successfully');
}

}
