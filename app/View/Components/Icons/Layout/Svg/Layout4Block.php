<?php

namespace App\View\Components\Icons\Layout\Svg;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Layout4Block extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|string
     */
    public function render()
    {
        return view('components.icons.layout.svg.layout4-block');
    }
}
