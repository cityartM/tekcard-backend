<?php

namespace Modules\Card\Http\Controllers;


use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Card\Http\Filters\CardKeywordSearch;
use Modules\Card\Http\Requests\CreateCardRequest;
use Modules\Card\Http\Requests\UpdateRefCardRequest;
use Modules\Card\Http\Resources\CardResource;
use Modules\Card\Models\Card;
use Modules\Card\Repositories\CardRepository;
use App\Http\Controllers\Api\ApiController;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;



class CardApiController extends ApiController
{
    private $cards;

    public function __construct(CardRepository $cards)
    {
        $this->cards = $cards;
    }
    public function index(Request $request)
    {
        $cards = QueryBuilder::for(Card::class)
         ->where('user_id',auth()->user()->id)
         ->allowedFilters([
            AllowedFilter::custom('search', new CardKeywordSearch),
        ])
        ->allowedSorts(['id,is_main'])
        ->defaultSort('-is_main')
        ->paginate($request->per_page ?: 10);


        return $this->respondWithSuccess([
            'remarks' => CardResource::collection($cards)->response()->getData(true),
        ],  'Cards retrieved successfully', 200);

    }


    public function show($ref)
    {
        //$card = Card::find($id);
        $card = Card::where('reference',$ref)->first();

        return $this->respondWithSuccess([
            'card' => new CardResource($card),
        ], 'Card retrieved successfully', 200);
    }

    public function store(CreateCardRequest $request)
    {
        $data = $request->only(['name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color', 'is_single_link', 'single_link_contact_id','is_main']);
        $data['reference'] = Helper::generateCode(15);
        $data['user_id'] = auth()->id();

        $card = Card::create($data);

        $card->cardApps()->attach($request->card_apps);

        if ($request->hasFile('card_avatar') ) {
            $card->addMedia($request->file('card_avatar'))->toMediaCollection('CARD_AVATAR');
        }

        return $this->respondWithSuccess([
            'card' => new CardResource($card),
        ], 'Card created successfully', 200);
    }


    public function destroy($id)
    {
        $card = Card::find($id);

        if (!$card) {
        return $this->respondWithSuccess(
            ['message' => 'Card not found'],
            'Card not found',404
        );}

        if ($card->user_id !== auth()->id()) {
            return $this->respondWithSuccess(
                ['message' => 'You are not authorized to delete this card'],
                'Authorization failed',200
            );
        }
        $card->clearMediaCollection('CARD_AVATAR');

        $card->delete();

        return $this->respondWithSuccess([
            'card' => new CardResource($card),
        ],  'Card deleted successfully', 200);
    }


    public function checkAvailability(Request $request)
    {
        $card = Card::where('reference', $request->reference)->first();

        if (!$card) {
            return $this->respondWithSuccess(
                [ 'availability' => true],
                'Card not found',200
            );
        }

        return $this->respondWithSuccess([
            'availability' => false,
        ],  'Card retrieved successfully', 200);
    }

    public function updateReference(UpdateRefCardRequest $request)
    {

         $card = Card::find($request->card_id);

         $newCard = $this->cards->update($card->id, ['reference' => $request->new_reference]);

        return $this->respondWithSuccess([
            'card' => new CardResource($newCard),
        ],  'Card reference updated successfully', 200);
    }

    public function setMainCard($id)
    {
        Card::query()->update(['is_main'=>0]);
        $card = $this->cards->update($id,['is_main' => 1]);
        return $this->respondWithSuccess([
            'card' => new CardResource($card),
        ],  'Card reference updated successfully', 200);
    }
}
