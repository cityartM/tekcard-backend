<?php

namespace Modules\Card\Http\Controllers;


use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Modules\Card\Http\Filters\CardContactKeywordSearch;
use Modules\Card\Http\Filters\CardKeywordSearch;
use Modules\Card\Http\Requests\CreateCardContactRequest;
use Modules\Card\Http\Requests\UpdateRefCardRequest;
use Modules\Card\Http\Resources\CardContactResource;
use Modules\Card\Http\Resources\CardResource;
use Modules\Card\Models\Card;
use Modules\Card\Models\CardContact;
use Modules\Card\Repositories\CardContactRepository;
use App\Http\Controllers\Api\ApiController;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

use Modules\ContactUser\Http\Resources\RemarkResource;


class CardContactApiController extends ApiController
{
    private $cardContacts;

    public function __construct(CardContactRepository $cardContacts)
    {
        $this->cardContacts = $cardContacts;
    }
    public function index(Request $request)
    {
        $cards = QueryBuilder::for(CardContact::class)
         ->where('user_id',auth()->user()->id)
         ->allowedFilters([
            AllowedFilter::custom('search', new CardContactKeywordSearch),
        ])
        ->allowedSorts(['id'])
        ->defaultSort('id')
        ->paginate($request->per_page ?: 1);


        return $this->respondWithSuccess([
            'cardContacts' => CardContactResource::collection($cards)->response()->getData(true),
        ],  'Card Contacts retrieved successfully', 200);

    }


    public function show($id)
    {
        $card = Card::find($id);

        return $this->respondWithSuccess([
            'cardContact' => new CardResource($card),
        ], 'Card retrieved successfully', 200);
    }

    public function store(CreateCardContactRequest $request)
    {
        $data = $request->only(['card_id', 'remark_id', 'group']);

        $data['user_id'] = auth()->id();

        $cardContact = $this->cardContacts->create($data);

        return $this->respondWithSuccess([
            'cardContact' => new CardContactResource($cardContact),
        ], 'Card Contact created successfully', 200);
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
                'Authorization failed',403
            );
        }

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
}
