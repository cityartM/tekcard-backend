<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;

class Address extends Plugin
{
    public function sidebar()
    {
        $countries = Item::create(__('app.Countries'))
            ->route('country.index')
            ->active("address*")
            ->permissions('address.manage');

        $wilayas = Item::create(__('app.Wilaya'))
            ->route('address.index')
            ->active("address*")
            ->permissions('address.manage');

        $cities = Item::create(__('app.City'))
            ->route('city.index')
            ->active("address*")
            ->permissions('address.manage');

        return Item::create(__('app.Address'))
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
