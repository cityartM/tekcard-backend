<?php

namespace Modules\AboutCard\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Helpers\Helper;

use Modules\AboutCard\Models\AboutCard;
use LaravelLocalization;
use Modules\AboutCard\Http\Requests\CreateAboutCardRequest;
use Spatie\MediaLibrary\Models\Media;
use Modules\AboutCard\Repositories\AboutCardRepository;

class AboutCardController extends Controller
{
    private $aboutCards;

    function __construct(AboutCardRepository $aboutCards)
    {
        $this->aboutCards = $aboutCards;
    }



    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->aboutCards->getDatatables()->datatables($request);
        }
        return view("aboutcard::index")->with([
            "columns" => $this->aboutCards->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $edit= false;
        return view('aboutcard::add-edit' , compact('edit'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateAboutCardRequest $request)
    {
        $data = $request->only(['title', 'description']);

        $aboutCard = $this->aboutCards->create($data);

         if ($request->hasFile('image')) {
             $aboutCard->addMedia($request->file('image'))->toMediaCollection('about_card');
         }

         return redirect()->route('aboutCards.index')
         ->with('success', 'aboutCards entry created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('aboutcard::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $aboutCard = AboutCard::find($id);
        $edit = true;
        return view('aboutcard::add-edit', compact('edit','aboutCard'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CreateAboutCardRequest $request, AboutCard $aboutCard)
    {
        $data = $request->only(['title', 'description']);

        $this->aboutCards->update($aboutCard->id,$data);

        if ($request->hasFile('image')) {
            $aboutCard->clearMediaCollection('about_card'); // Remove existing media
            $aboutCard->addMedia($request->file('image'))->toMediaCollection('about_card');
        }

        return redirect()->route('aboutCards.index')
            ->with('success', 'aboutCard entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $aboutCard = AboutCard::find($id);

        if (!$aboutCard) {
            return redirect()->route('aboutCards.index')
                ->with('error', 'aboutCard entry not found');
        }
        $aboutCard->clearMediaCollection('about_card');

        $aboutCard->delete();

        return redirect()->route('aboutCards.index')->with('success', 'aboutCard entry deleted successfully');
    }
}
