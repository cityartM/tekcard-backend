<?php

namespace App\View\Components\Datatable;

use Illuminate\View\Component;

class HtmlStructure extends Component
{
    public bool $action;

    public function __construct(bool $action = true)
    {
        $this->action = $action;
    }

    public function render()
    {
        return view('components.datatable.html-structure');
    }
}
