<?php

namespace Modules\Card\Http\Controllers;


use App\Helpers\Helper;
use App\Models\User;
use App\Repositories\Role\RoleRepository;
use App\Support\Enum\UserStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

    private $roles;

    public $only = ['name', 'full_name', 'company_name', 'company_id', 'job_title', 'background_id', 'color', 'is_single_link', 'single_link_contact_id','is_main'];

    public function __construct(CardRepository $cards,RoleRepository $roles)
    {
        $this->cards = $cards;
        $this->roles = $roles;
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

        $data = $request->only($this->only);
        $data['reference'] = Helper::generateCode(15);
        $data['user_id'] = auth()->id();

        $card = $this->cards->create($data);

        $card->cardApps()->attach($request->card_apps);

        if ($request->hasFile('card_avatar') ) {
            $card->addMedia($request->file('card_avatar'))->toMediaCollection('CARD_AVATAR');
        }

        return $this->respondWithSuccess([
            'card' => new CardResource($card),
        ], 'Card created successfully', 200);
    }

    public function storeUserCompany(CreateCardRequest $request)
    {
        $adminCompany = auth()->user();
        if($adminCompany->role->name != 'Company'){
            return $this->sendFailedResponse('You are not allowed to create card for this company', 200);
        }
        $data = $request->only($this->only);
        $existUser = User::where('email',$request->email)->first();

        if($existUser){
            $data['user_id'] = $existUser->id;
        }else{
            $role = $this->roles->findByName('User');
            $password = Str::random(8);
            $userData = [
                'company_id' => $adminCompany->company_id,
                'role_id' => $role->id,
                'username' => $request->username,
                'email' => $request->email,
                'status'=>UserStatus::ACTIVE,
                'password' => $password,
            ];
            $user = User::create($userData);
            $data['user_id'] = $user->id;
            Mail::to($request->email)->send(new \App\Mail\UserRegistered($user,$password));
        }

        $data['reference'] = Helper::generateCode(15);

        $card = $this->cards->create($data);

        //$card->cardApps()->attach($request->card_apps);

        if ($request->hasFile('card_avatar') ) {
            $card->addMedia($request->file('card_avatar'))->toMediaCollection('CARD_AVATAR');
        }

        return $this->respondWithSuccess([
            'card' => new CardResource($card),
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
