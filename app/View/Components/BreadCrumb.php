<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BreadCrumb extends Component
{
    public array $routes;

    public function __construct(array $routes)
    {
        $this->routes = $routes;
    }

    public function render()
    {
        return view('components.bread-crumb');
    }
}
