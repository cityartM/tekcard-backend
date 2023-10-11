<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class AddButton extends Component
{
    public string $title;
    public string $route;

    public function __construct(string $title, string $route)
    {
        //
        $this->title = $title;
        $this->route = $route;
    }

    public function render()
    {
        return view('components.button.add-button');
    }
}
