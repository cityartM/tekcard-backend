<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;

class Cards extends Plugin
{
    public function sidebar()
    {
        $cards = Item::create(__('app.cards'))
        ->route('cards.index')
        ->active("cards")
        ->permissions('cards.manage');

        $cardOrders = Item::create(__('app.card_orders'))
        ->route('cardOrders.index')
        ->active("cardsh")
        ->permissions('cards.manage');

    

    return Item::create(__('app.cards'))
        ->href('#settings-dropdown')
        ->icon('fas fa-cogs')
        ->permissions(['cards.manage'])
        ->addChildren([
            $cards,
            $cardOrders,
            
        ]);


        
    }
}
