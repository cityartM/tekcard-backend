<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class CardInputImage extends Component
{
    public ?string $url;
    public ?string $information;
    public function __construct(?string $url = null, ?string $information = null)
    {
        $this->url = $url;
        $this->information = $information;
    }

    public function render()
    {
        return view('components.card.card-input-image');
    }
}
