<?php

namespace App\Support\Enum;

class TranslateLanguages
{
    public static function lists()
    {
        return [
            "ar" =>[
                "name" => "Arabic",
                "script" => "Arab",
                "native" => "العربية",
                "regional" => "ar-AR",
                "flag" => "assets/flags/saudi-arabia.svg",
            ],

            "en" => ["name" => "English",
            "script" => "Latn",
            "native" => "English",
            "regional" => "en-US",
            "flag" => "assets/flags/united-states.svg"
            ],

            "tr" =>["name" => "Turkey",
                "script" => "Latn",
                "native" => "Türkçe",
                "regional" => "tr_TR",
                "flag" => "assets/flags/turkish.svg"
            ],

            /*"fr" =>["name" => "French",
                "script" => "Latn",
                "native" => "Français",
                "regional" => "fr_FR",
                "flag" => "assets/flags/france.svg"
            ]*/
            ];
    }

}
