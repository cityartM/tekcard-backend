<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class CardToolbar extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.card.card-toolbar');
    }
}
