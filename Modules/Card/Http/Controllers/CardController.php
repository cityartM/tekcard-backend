<?php

namespace Modules\Card\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Card\Repositories\CardRepository;
use Modules\Card\Models\Card;
use Modules\Background\Models\Background;
use App\Helpers\Helper;
use Modules\Card\Http\Requests\CreateCardRequest;


class CardController extends Controller
{

    private $cards;

    public function __construct(CardRepository $cards)
    {
        $this->cards = $cards;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->cards->getDatatables()->datatables($request);
        }
        return view("card::index")->with([
            "columns" => $this->cards->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $backgrounds = Background::query();
        //dd($backgrounds->pluck('id', 'id')->toArray());
        $edit=false;
        return view('card::add-edit-card',compact("edit","backgrounds"));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CreateCardRequest $request)
    {
        $data = $request->only(['name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color']);
        $data['reference'] = Helper::generateCode(15);
        $data['user_id'] = auth()->id();

        $cards = $this->cards->create($data);

     //   $card->cardApps()->attach($request->card_apps);

        if ($request->hasFile('avatar') ) {
            $cards->addMedia($request->file('avatar'))->toMediaCollection('CARD_AVATAR');
        }

        return redirect()->route('cards.index')
        ->with('success', 'card  entry created successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('card::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('card::edit');
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
