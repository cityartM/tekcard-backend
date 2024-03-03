<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;

class Pages extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('app.custom_pages'))
            ->route('pages.index')
            ->icon('<span class="svg-icon svg-icon-2"><i class="fa fa-cubes mx-1"></i></span>')
            ->active("Pages*")
            ->permissions('pages.manage');
    }
}
