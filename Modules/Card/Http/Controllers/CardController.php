<?php

namespace Modules\Card\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use Modules\Card\Http\Requests\UpdateCardRequest;
use Modules\Card\Repositories\CardRepository;
use Modules\Card\Models\Card;
use Modules\Background\Models\Background;
use App\Helpers\Helper;
use Modules\Card\Http\Requests\CreateCardRequest;
//Qr
use SimpleSoftwareIO\QrCode\Facades\QrCode;


class CardController extends Controller
{

    private $cards;

    public $only = ['name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color','color_icon', 'is_single_link', 'single_link_contact_id','is_main',
    'email','phone', 'url_web_site', 'iban', 'lat', 'lon', 'address', 'note','contact_apps',
    ];

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
        $data = $request->only($this->only);

        $items = collect($data['contact_apps'])->map(function($item){
            foreach ($item as $key => $value) {
                $items['contact_id'] = $value['contact_id'];
                $items['title'] = $value['title'];
                $items['value'] = $value['value'];
            }

            return $items;
            });

        $data['reference'] = Helper::generateCode(15);
        $data['user_id'] = auth()->id();
        $data['is_single_link'] = 0;
        $data['is_main'] = 0;

        $card = $this->cards->create($data);

       $card->cardApps()->attach($items);

        if ($request->hasFile('avatar') ) {
            $card->addMedia($request->file('avatar'))->toMediaCollection('CARD_AVATAR');
        }

        if ($request->hasFile('card_video') ) {
            $card->addMedia($request->file('card_video'))->toMediaCollection('CARD_VIDEO');
        }

        if ($request->hasFile('pdf_file') ) {
            $card->addMedia($request->file('pdf_file'))->toMediaCollection('CARD_PDF');
        }

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $card->addMedia($image)->toMediaCollection('CARD_GALLERY');
            }
        }

        // Qr generate and save
        // Generate a QR code for the link "cards/{id}"
         $qrCode = QrCode::size(300)->generate(route('cards.show', $card->id));

        // Save the QR code image to the media library
        $card->addMediaFromBase64(base64_encode($qrCode))->toMediaCollection('qrcodes');

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
        $data = $request->only(['name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color','color_icon']);

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
