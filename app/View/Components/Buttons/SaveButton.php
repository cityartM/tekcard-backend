<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class SaveButton extends Component
{

    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.buttons.save-button');
    }
}
