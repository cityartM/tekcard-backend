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

        $features_company = Item::create(__('app.features_company'))
            ->route('company.index')
            ->active("features*")
            ->permissions('features.manage');

        $features_client = Item::create(__('app.features_client'))
            ->route('client.index')
            ->active("features*")
            ->permissions('features.manage');

        return Item::create(__('app.plans_features'))
            ->href('#plans-dropdown')
            ->icon('fas fa-users-cog')
            ->permissions(['plans.manage', 'features.manage'])
            ->addChildren([
                $plans,
                $features_company,
                $features_client
            ]);
    }
}
