<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;

class FeedBack extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('app.feedback'))
            ->route('feedback.index')
            ->icon('<span class="svg-icon svg-icon-2"><i class="fa fa-cubes mx-1"></i></span>')
            ->active("feedback*")
            ->permissions('feedback.manage');
    }
}
