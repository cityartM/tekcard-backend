<?php

namespace App\View\Components\Buttons;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BackButtonComponent extends Component
{
    public string $route;

    public function __construct(string $route)
    {
        //
        $this->route = $route;
    }

    public function render()
    {
        return view('components.buttons.back-button-component');
    }
}
