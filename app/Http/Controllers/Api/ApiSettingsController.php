<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CurrenciesResource;
use App\Http\Resources\SettingsResource;
use App\Models\Currency;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Address\Models\Country;
use Modules\Address\Transformers\CountryResource;
use Modules\Advice\Http\Resources\AdviceResource;
use Modules\Advice\Models\Advice;
use Modules\Background\Http\Resources\BackgroundResource;
use Modules\Background\Models\Background;
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
        $shareBackground = Background::where('type', 'Share')->get();
        $cardBackground = Background::where('type', 'Card')->get();
        $settings = [
            'app_name' => setting('app_name'),
            'contact' =>  ContactSettingsResource::collection($contact),
            'share_background' => BackgroundResource::collection($shareBackground),
            'card_background' => BackgroundResource::collection($cardBackground),
            'countries' => CountryResource::collection(Country::all()),
            'delivery_price' => setting('delivery_price') ?? 0,
            'order_price' => setting('order_price') ?? 0,
            'url_android' => setting('url_android') ?? null,
            'url_apple' => setting('url_apple') ?? null,
            'whatsApp' => setting('whatsApp') ?? null,
            'privacy-policy' => setting('privacy-policy') ?? null,
            'about' => setting('about') ?? null,
            'bronze_level' => (int) setting('bronze_level') ?? 0,
            'silver_level' => (int) setting('silver_level') ?? 0,
            'gold_level' => (int) setting('gold_level') ?? 0,
            'instagram_url' => setting('instagram_url') ?? null,
            'tiktok_url' => setting('tiktok_url') ?? null,
            'facebook_url' => setting('facebook_url') ?? null,
            'youtube_url' => setting('youtube_url') ?? null,
            'twitter_url' => setting('twitter_url') ?? null,
            'linkedIn_url' => setting('linkedIn_url') ?? null,
        ];
        return $this->respondWithSuccess($settings);
    }
}
