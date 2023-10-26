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
use Modules\GlobalSetting\Http\Resources\ContactSettingsResource;
use Modules\GlobalSetting\Models\SettingContact;
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
        $contact = SettingContact::all();
        $settings = [
            'app_name' => setting('app_name'),
            'contact' =>  ContactSettingsResource::collection($contact),
        ];
        return $this->respondWithSuccess($settings);
    }
}
