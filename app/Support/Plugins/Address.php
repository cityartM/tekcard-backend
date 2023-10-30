<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;

class Address extends Plugin
{
    public function sidebar()
    {
        $countries = Item::create(__('app.countries'))
            ->route('country.index')
            ->active("address*")
            ->permissions('address.manage');

        $wilayas = Item::create(__('app.wilaya'))
            ->route('address.index')
            ->active("address*")
            ->permissions('address.manage');

        $cities = Item::create(__('app.city'))
            ->route('city.index')
            ->active("address*")
            ->permissions('address.manage');

        return Item::create(__('app.address'))
            ->href('#roles-dropdown')
            ->icon('fas fa-location-cog')
            ->permissions(['address.manage'])
            ->addChildren([
                $countries,
                $wilayas,
                $cities
            ]);
    }
}
