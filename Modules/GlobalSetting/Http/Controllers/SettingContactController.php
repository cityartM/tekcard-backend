<?php

namespace Modules\GlobalSetting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\GlobalSetting\Http\Requests\CreateSettingContactRequest;
use Modules\GlobalSetting\Models\SettingContact;
use Modules\GlobalSetting\Repositories\SettingContactRepository;
use Modules\GlobalSetting\Support\Enum\ContactType;

class SettingContactController extends Controller
{

    private SettingContactRepository $contacts;

    function __construct(SettingContactRepository $contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->contacts->getDatatables()->datatables($request);
        }
        return view("globalsetting::index")->with([
            "columns" => $this->contacts->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $edit = false;
        return view('globalsetting::add-edit', compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     * @param CreateSettingContactRequest $request
     * @return RedirectResponse
     */
    public function store(CreateSettingContactRequest $request)
    {
        $data = $request->only(['display_name', 'value', 'icon','icon2', 'category','color']);
        $data['user_id'] = auth()->user()->id;
        $settingContact = $this->contacts->store($data);

        if ($request->hasFile('icon')) {
            $settingContact->addMedia($request->file('icon'))->toMediaCollection(ContactType::ICONCONTACT);
        }
        if ($request->hasFile('icon2')) {
            $settingContact->addMedia($request->file('icon2'))->toMediaCollection(ContactType::ICONCONTACT2);
        }

        return redirect()->route('settingContacts.index')
            ->with('success', 'Setting contact created successfully.');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show(int $id)
    {
        return view('globalsetting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(int $id)
    {
        $edit = true;
        $settingContact = SettingContact::find($id);
        return view('globalsetting::add-edit', compact('settingContact', 'edit'));
    }

    /**
     * Update the specified resource in storage.
     * @param CreateSettingContactRequest $request
     * @param SettingContact $settingContact
     * @return RedirectResponse
     */
    public function update(CreateSettingContactRequest $request, SettingContact $settingContact)
    {
        $data = $request->only(['display_name', 'value', 'icon', 'icon2','category','color']);

        $contact = $this->contacts->update($settingContact->id, $data);

        if ($request->hasFile('icon')) {
            $contact->clearMediaCollection(ContactType::ICONCONTACT);
            $contact->addMedia($request->file('icon'))->toMediaCollection(ContactType::ICONCONTACT);
        }
        if ($request->hasFile('icon2')) {
            $contact->clearMediaCollection(ContactType::ICONCONTACT2);
            $contact->addMedia($request->file('icon2'))->toMediaCollection(ContactType::ICONCONTACT2);
        }

        return redirect()->route('settingContacts.index')->with('success', 'Setting contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        $this->contact->delete($id);

        return redirect()->route('settingContacts.index')
            ->with('success', 'Setting contact deleted successfully.');
    }
}
