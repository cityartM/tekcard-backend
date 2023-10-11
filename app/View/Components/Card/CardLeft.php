<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class CardLeft extends Component
{
    public string $title;
    public ?string $information;
    public function __construct(string $title, ?string $information = null)
    {
        $this->title = $title;
        $this->information =  $information;
    }

    public function render()
    {
        return view('components.card.card-left');
    }
}
