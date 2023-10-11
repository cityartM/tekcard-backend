<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;
use Illuminate\View\View;

class UpdateButton extends Component
{

    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.buttons.update-button');
    }
}
