<?php

namespace Modules\GlobalSetting\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\GlobalSetting\Models\SettingContact;
use Spatie\MediaLibrary\Models\Media;
use LaravelLocalization;

use Modules\GlobalSetting\Support\Enum\ContactType;

use Modules\GlobalSetting\Http\Requests\CreateSettingContactRequest;

use Modules\GlobalSetting\Repositories\SettingContactRepository;

class SettingContactController extends Controller
{

    private $contact;

    function __construct(SettingContactRepository $contact)
    {
        $this->contact= $contact;
    } 



    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->contact->getDatatables()->datatables($request);
        }
        return view("globalsetting::index")->with([
            "columns" => $this->contact->getDatatables()::columns(),
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
        $data = $request->only(['display_name', 'value', 'icon' ,'type']);

        $user = auth()->user();

        $settingContact =  $this->contact->store($user,$request);

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
        $data = $request->only(['display_name', 'value', 'icon', 'type']);

        
        
        $this->contact->update($settingContact ,$request);

        if ($request->hasFile('icon')) {
            $settingContact->clearMediaCollection(ContactType::ICONCONTACT);
            $settingContact->addMedia($request->file('icon'))->toMediaCollection(ContactType::ICONCONTACT);  
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
