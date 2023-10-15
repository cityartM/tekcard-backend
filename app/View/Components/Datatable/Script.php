<?php

namespace App\View\Components\Datatable;

use Illuminate\View\Component;

class Script extends Component
{
    public string $route;
    public array $columns;
    public bool $action;

    public function __construct($route, $columns,bool $action = true)
    {
        $this->route = $route;
        $this->columns = $columns;
        $this->action = $action;
    }

    public function render()
    {
        return view('components.datatable.script');
    }
}
