<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\SettingsResource;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Advice\Http\Resources\AdviceResource;
use Modules\Advice\Models\Advice;
use Modules\MotivationalPhrases\Http\Resources\MotivationalPhrasesResource;
use Modules\MotivationalPhrases\Models\MotivationalPhrase;
use Modules\Plan\Models\Plan;
use Modules\Strategy\Http\Resources\StrategyResource;
use Modules\Strategy\Models\Strategy;
use Setting;

class ApiSettingsController extends ApiController
{
    public function general(Request $request)
    {
        $plan = Plan::where('user_id',Auth::id())
            ->where('start_date', '>', Carbon::now()->subDays(30))
            ->first();
        $currencies = Currency::all();
        $daysTimes = Strategy::AllBySumDay()->get();
        $motivationalPhrases = MotivationalPhrase::query()->get();

        if(isset($plan)){
            if(Carbon::now() >= $plan->start_date) {
                $currentDay = Carbon::now()->addDay()->diffInDays($plan->start_date);
               // return $currentDay;
                $strategies = Strategy::query()->where('day', $currentDay)->get();
                $advice = Advice::where('day', $currentDay)->first();
                $nbr_of_cigarette_expected_to_be_smoked = $currentDay * $plan->number_of_cigarettes;
                $nbr_of_cigarette_previous = Strategy::AllBySumPerDay($currentDay)->first()->cigarette;
                //$benefic = ($nbr_of_cigarette_expected_to_be_smoked - $nbr_of_cigarette_previous) * $plan->price;
            }else{
                $currentDay = 0;
                $strategies = null;
                $advice = null;
                $nbr_of_cigarette_expected_to_be_smoked = 0;
                $nbr_of_cigarette_previous = 0;
            }
        }else{
                $currentDay = 0;
                $strategies = null;
                $advice = null;
                $nbr_of_cigarette_expected_to_be_smoked = 0;
                $nbr_of_cigarette_previous = 0;
        }

        $settings = [
            'timezone' => $request->header('timezone'),
            'app_name' => setting('app_name'),
            'free_days' => setting('free_days'),
            'price_subscribe' => setting('price_subscribe'),
            'currencies' => CurrenciesResource::Collection($currencies),
            'daysTimes' => $daysTimes,
            'currentDay' => $currentDay,
            'cigarette_not_smoked' => $nbr_of_cigarette_expected_to_be_smoked - $nbr_of_cigarette_previous,
            //'benefic' => $nbr_of_cigarette_expected_to_be_smoked - $nbr_of_cigarette_previous,
            'strategies' => $strategies != null ? StrategyResource::collection($strategies) : [],
            'advice' =>  $advice != null ? new AdviceResource($advice) : [],
            'motivationalPhrases' => MotivationalPhrasesResource::collection($motivationalPhrases),
        ];
        return $this->respondWithSuccess($settings);
    }
}
