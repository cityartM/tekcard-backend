<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;

class PlansAndFeatures extends Plugin
{
    public function sidebar()
    {
        $plans = Item::create(__('app.plans'))
            ->route('plans.index')
            ->active("plans*")
            ->permissions('plans.manage');

        $features = Item::create(__('app.features'))
            ->route('features.index')
            ->active("features*")
            ->permissions('features.manage');

        return Item::create(__('app.plans_features'))
            ->href('#plans-dropdown')
            ->icon('fas fa-users-cog')
            ->permissions(['plans.manage', 'features.manage'])
            ->addChildren([
                $plans,
                $features
            ]);
    }
}
