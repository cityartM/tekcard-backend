<?php

namespace Modules\GlobalSetting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Modules\GlobalSetting\Models\SettingContact;
use Spatie\MediaLibrary\Models\Media;
use LaravelLocalization;

use Modules\GlobalSetting\Support\Enum\ContactType;

use Modules\GlobalSetting\Http\Requests\CreateSettingContactRequest;

use Modules\GlobalSetting\Repositories\SettingContactRepository;

class SettingContactController extends Controller
{

    private $contacts;

    function __construct(SettingContactRepository $contacts)
    {
        $this->contacts= $contacts;
    }



    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
         $contact = SettingContact::where('id',1)->first();




       /* $contacts = SettingContact::select('category', 'display_name', 'value')
            ->get()
            ->groupBy('category');*/

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
        $edit=false;
        return view('globalsetting::add-edit' , compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateSettingContactRequest $request)
    {
        $data = $request->only(['display_name', 'value', 'icon' ,'category']);
        $data['user_id'] = auth()->user()->id;
        $settingContact =  $this->contacts->store($data);

        if ($request->hasFile('icon')) {
            $settingContact->addMedia($request->file('icon'))->toMediaCollection(ContactType::ICONCONTACT);
        }

        return redirect()->route('settingContacts.index')
        ->with('success', 'Setting contact created successfully.');

    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('globalsetting::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $edit=true;
        $settingContact = SettingContact::find($id);
        return view('globalsetting::add-edit' , compact('settingContact' ,'edit'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreateSettingContactRequest $request, SettingContact $settingContact)
    {
        $data = $request->only(['display_name', 'value', 'icon', 'category']);

        $contact = $this->contacts->update($settingContact->id ,$data);

        if ($request->hasFile('icon')) {
            $contact->clearMediaCollection(ContactType::ICONCONTACT);
            $contact->addMedia($request->file('icon'))->toMediaCollection(ContactType::ICONCONTACT);
        }

        return redirect()->route('settingContacts.index')->with('success', 'Setting contact updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->contact->delete($id);

        return redirect()->route('settingContacts.index')
            ->with('success', 'Setting contact deleted successfully.');
    }
}
