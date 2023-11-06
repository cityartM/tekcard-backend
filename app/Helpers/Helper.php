<?php

namespace App\Helpers;

//use App\Models\VerificationCode;
use App\Models\TokenDevice;
use App\Models\VerificationCode;
use Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use NumberToWords\NumberToWords;
use Stichoza\GoogleTranslate\GoogleTranslate;
use LaravelLocalization;

class Helper
{
    public static function checkApiLanguage()
    {
        $language = LaravelLocalization::getCurrentLocale();

        if (request()->lang) {
            $language = request()->lang;
        } elseif (request()->header("lang")) {
            $language = request()->header("lang");
        } elseif (request()->header("Accept-Language")) {
          if(request()->isJson() || request()->is('multipart/form-data')){
              $language = request()->header("Accept-Language");
          }
        } elseif (Auth::user()) {
            $language = Auth::user()->lang;
        }
        return $language;
    }
    public static function sendOtp($phone,$via = "phone")
    {

        $code = random_int(1000, 9999);

        $code = 1234;

        if ($via = "phone" || $via == "sms") {
            /* $phone = $model->phone;
             $basic  = new Basic(env('NEXMO_KEY'), env('NEXMO_SECRET'));
             $client = new Client($basic);
             $client->sms()->send(
                 new SMS($phone, 'HEC', 'Hello ! Your verification code is ' . $code)
             );*/
            // SMS GATEWAY IMPLEMENTATION GO HERE
        }

        $verificationCodeExists = VerificationCode::query()->where([
            "phone" => $phone,
        ])->exists();

        if ($verificationCodeExists) {
            VerificationCode::query()->where([
                "phone" => $phone,
            ])->delete();
        }

        $verificationCode = VerificationCode::query()->create([
            "uuid" => Str::uuid()->toString(),
            "otp" => Hash::make($code),
            "phone" => $phone,
        ]);

        return $verificationCode->uuid;
    }

    public static function isOtpValid($uuid, $otp,$delete = false)
    {
        $verificationCode = VerificationCode::query()->where("uuid", $uuid)->first();

        if (is_null($verificationCode)) {
            return false;
        }

        if (Hash::check($otp, $verificationCode->otp)) {
            $delete ? $verificationCode->delete() : null;
            return true;
        }

        return false;
    }

    public static function translate($to, $word, $from = null): ?string
    {
        if (!is_null($word)) {
            $googleTranslate = new GoogleTranslate();
            if ($from == null) {
                $googleTranslate->setSource();
            } else {
                $googleTranslate->setSource($from);
            }
            $googleTranslate->setTarget($to);
            return $googleTranslate->translate($word);
        }
        return $word ?? "";
    }

    public static function fillMultilingualField(&$array, $key, $target_locale = null): void
    {
        $target_locale = $target_locale ?? self::getLocal();
        if(isset($array[$key])) {
            $first_locale = array_key_first($array[$key]);
            // loop through the display_name array and fill the empty language values with the default language value
            foreach (self::getLocalesOrder() as $locale => $value) {
                $array[$key][$locale] = $array[$key][$locale] ?? self::translate($locale, $array[$key][$target_locale]??$array[$key][$first_locale]);
            }
        }
    }

    public static function getLocalesOrder(): array
    {
        $array = LaravelLocalization::getLocalesOrder();
        $default = app()->getLocale(); // this could be whatever you like
        if(isset($array[$default])) {
            $defaultVal = $array[$default];
            unset($array[$default]);
        }


        asort($array);
        $array = array($default => $defaultVal) + $array;
        return $array;
    }

    public static function number_prefix_format(float $number)
    {
        $prefixes = [
            'en' => ['', 'Thousand', 'Million', 'Billion', 'Trillion', 'Quadrillion', 'Quintillion'],
            'fr' => ['', 'Mille', 'Million', 'Milliard', 'Billion', 'Billiard', 'Trillion'],
            'ar' => ['', 'ألف', 'مليون', 'مليار', 'ترليون', 'كوادريليون', 'كوينتيليون'],
        ];
        if ($number < 1000) return $number;
        $suffix = $prefixes[self::getLocal()];
        $power = floor(log($number, 1000));
        return round($number/(1000**$power),1,PHP_ROUND_HALF_EVEN).' '.$suffix[$power];
    }

    public static function getLocal(): string
    {

        return str_starts_with(request()->route()->getPrefix(), 'api')
            ? Helper::checkApiLanguage() : app()->getLocale();
    }

    public static function tokenDeviceExist($token,$id)
    {
        $token = TokenDevice::query()->where(["user_id"=>$id,"device_token", $token])->first();
        if (is_null($token)) {
            return false;
        }
        return true;
    }


    /*public static function translateAttribute(array $data): array
    {
        $defaultLocale = self::checkApiLanguage();
        $word = $data[$defaultLocale] != null ? $data[$defaultLocale] : current(array_filter($data));
        foreach ($data as $lang => $name) {
            if(empty($name)){
                $data[$lang] =  self::translate($lang, $word);
            }
        }
        return $data;
    }*/
    public static function translateAttribute(array $data): array
    {
        $defaultLocale = array_key_exists('lang', $data) ? $data['lang'] : self::checkApiLanguage() ;

        $word = $data[$defaultLocale] != null ? $data[$defaultLocale] : current(array_filter($data));
        foreach ($data as $lang => $name) {
            if(empty($name)){
                $data[$lang] =  self::translate($lang, $word);
            }
        }

        if(isset($data['lang'])){
            unset($data['lang']);
        }

        return $data;
    }


    public static function  generateCode($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString.date("m").date("s");
    }
}
