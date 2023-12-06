<?php

namespace Modules\Card\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


use Modules\Card\Repositories\ShippingRepository;
use Modules\Card\Models\Shipping;
use Modules\Background\Models\Background;
use App\Helpers\Helper;
use Modules\Card\Http\Requests\CreateShippingRequest;


class ShippingController extends Controller
{

    

    public function __construct(ShippingRepository $shippings)
    {
        $this->shippings = $shippings;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            return $this->shippings->getDatatables()->datatables($request);
        }
        return view("card::index_shipping")->with([
            "columns" => $this->shippings->getDatatables()::columns(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $backgrounds = Background::query();
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
       // dd($request['contact_apps']);
        $data = $request->only($this->only);
        
        $items = collect($data['contact_apps'])->map(function($item){
            foreach ($item as $key => $value) {
                $items['contact_id'] = $value['contact_id'];
                $items['title'] = $value['title'];
                $items['value'] = $value['value'];
            }

            return $items;
            });
        $data = $request->only(['name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color']);
        $data['reference'] = Helper::generateCode(15);
        $data['user_id'] = auth()->id();

        $card = $this->cards->create($data);

       $card->cardApps()->attach($items);

        if ($request->hasFile('avatar') ) {
            $card->addMedia($request->file('avatar'))->toMediaCollection('CARD_AVATAR');
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $card->addMedia($image)->toMediaCollection('gallery');
            }
        }

        if ($request->hasFile('pdf_file')) {
            $card->addMedia($request->file('pdf_file'))->toMediaCollection('pdf_files');
        }

        return redirect()->route('cards.index')
        ->with('success', 'Card  entry created successfully');
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
    public function edit(Card $card)
    {
        $backgrounds = Background::query();
        $edit= true;
        return view('card::add-edit-card', compact('edit','card','backgrounds'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCardRequest $request, Card $card)
    {
        $data = $request->only($this->only);

        $items = collect($data['contact_apps'])->map(function($item){
            foreach ($item as $key => $value) {
                $items['contact_id'] = $value['contact_id'];
                $items['title'] = $value['title'];
                $items['value'] = $value['value'];
            }

            return $items;
        });
        $data = $request->only(['name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color']);

        $card = $this->cards->update($card->id,$data);

        $card->cardApps()->sync($items);

        if ($request->hasFile('avatar') ) {
            $card->addMedia($request->file('avatar'))->toMediaCollection('CARD_AVATAR');
        }

        return redirect()->route('cards.index')
            ->with('success', 'Card  entry updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Card $card)
    {
            $card->clearMediaCollection('CARD_AVATAR');
            $card->delete();

            return redirect()->route('cards.index')
            ->with('success', 'card  entry deleted successfully');
    }
}
