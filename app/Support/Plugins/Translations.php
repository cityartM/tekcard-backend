<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;
use App\Models\User;

class Translations extends Plugin
{
    protected $languages = [
        'ar' => 'Arabic',
        'fr' => 'French',
        'en' => 'English',
        'cn' => 'Chinese (Mandarin)',
        'es' => 'Spanish',
        'ru' => 'Russian',
        'de' => 'German',
        'ja' => 'Japanese',
        'pt' => 'Portuguese',
        'ko' => 'Korean',
        'hi' => 'Hindi',
        'it' => 'Italian',
        'nl' => 'Dutch',
        'sv' => 'Swedish',
        'tr' => 'Turkish',
        'ml' => 'Bahasa melayu',
    ];

    public function sidebar()
    {
        $items = [];

        foreach ($this->languages as $code => $name) {
            $url = route('translations', ['lang' => $code]);
            $items[] = Item::create(__($name))
                  ->href($url)
                  ->active("translations");
        }

        return Item::create(__('app.Translations'))
            ->href('#settings-dropdown')
            ->icon('fas fa-cogs')
            ->addChildren($items);
    }
}