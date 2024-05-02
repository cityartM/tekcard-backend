<?php

namespace Modules\Background\Http\Controllers\Api;


use App\Helpers\Helper;
use App\Http\Controllers\Api\ApiController;
use App\Models\User;
use App\Repositories\Role\RoleRepository;
use App\Support\Enum\UserStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Modules\Background\Http\Requests\CreateBackgroundRequest;
use Modules\Background\Http\Resources\BackgroundResource;
use Modules\Background\Models\Background;
use Modules\Background\Repositories\BackgroundRepository;
use Modules\Card\Http\Filters\CardKeywordSearch;
use Modules\Card\Http\Requests\CreateCardRequest;
use Modules\Card\Http\Requests\UpdateRefCardRequest;
use Modules\Card\Http\Resources\CardContactResource;
use Modules\Card\Http\Resources\CardResource;
use Modules\Card\Models\Card;
use Modules\Card\Models\CardStatistic;
use Modules\Card\Repositories\CardContactRepository;
use Modules\Card\Repositories\CardRepository;
use Modules\Card\Support\StatisticType;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;


class BackgroundApiController extends ApiController
{
    private $backgrounds;

    public $only = ['type','name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color','color_icon','color_qr', 'is_single_link', 'single_link_contact_id','is_main',
                    'email','phone', 'url_web_site', 'iban', 'lat', 'lon', 'address', 'note',
                    ];

    private $cardContacts;

    public function __construct(BackgroundRepository $backgrounds)
    {
        $this->backgrounds = $backgrounds;

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

    public function store(Request $request)
    {

        $data['type'] = 'Card';
        $data['user_id'] = auth()->id();

        $background = Background::create($data);

        if ($request->hasFile('image')) {
            $background->addMedia($request->file('image'))->toMediaCollection('background');
        }

        return $this->respondWithSuccess([
            'background' => new BackgroundResource($background),
        ], 'Card created successfully', 200);
    }

    public function destroy(Card $card)
    {
        if (!$card) {
        return $this->respondWithSuccess(
            ['message' => 'Card not found'],
            'Card not found',200
        );}

        if ($card->user_id !== auth()->id()) {
            return $this->respondWithSuccess(
                ['message' => 'You are not authorized to delete this card'],
                'Authorization failed',200
            );
        }
        if($card->is_main){
            $card->clearMediaCollection('CARD_AVATAR');

            $card->delete();

            $mainCard = Card::where('user_id',auth()->id())->first();
            if($mainCard){
                $mainCard->update(['is_main' => 1]);
                return $this->respondWithSuccess([
                    'card' => new CardResource($mainCard),
                ],  'Card deleted successfully', 200);
            }else{
                return $this->respondWithSuccess([
                    'card' => null,
                ],  'Card deleted successfully', 200);
            }

        }

    }



}
