<?php

namespace Modules\Card\Http\Controllers;


use Illuminate\Http\Request;
use Modules\Card\Http\Filters\CardKeywordSearch;
use Modules\Card\Http\Requests\CreateCardRequest;
use Modules\Card\Http\Resources\CardResource;
use Modules\Card\Models\Card;
use Modules\Card\Repositories\CardRepository;
use Modules\ContactUser\Http\Controllers\Controller;
use Modules\ContactUser\Models\Remark;
use Modules\ContactUser\Http\Requests\CreateRemarkRequest;
use Modules\ContactUser\Repositories\RemarkRepository;
use App\Http\Controllers\Api\ApiController;
use Modules\ContactUser\Http\Filters\RemarkKeywordSearch;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

use Modules\ContactUser\Http\Resources\RemarkResource;


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
        ->allowedSorts(['id'])
        ->defaultSort('id')
        ->paginate($request->per_page ?: 1);


        return $this->respondWithSuccess([
            'remarks' => CardResource::collection($cards)->response()->getData(true),
        ],  'Cards retrieved successfully', 200);

    }


    public function show($id)
    {
        $card = Card::find($id);

        return $this->respondWithSuccess([
            'card' => new CardResource($card),
        ], 'Card retrieved successfully', 200);
    }

    public function store(CreateCardRequest $request)
    {
        $data = $request->only(['name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color', 'is_single_link', 'single_link_contact_id']);
        $data['user_id'] = auth()->id();

        $card = Card::create($data);

        return $this->respondWithSuccess([
            'card' => new CardResource($card),
        ], 'Card created successfully', 200);
    }

    public function update(CreateRemarkRequest $request, $id)
    {

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
}
