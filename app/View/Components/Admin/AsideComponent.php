<?php

namespace App\View\Components\Admin;

use App\Layouts\Admin\AsideLinks;
use Illuminate\View\Component;

class AsideComponent extends Component
{
    public array $links;

    public function __construct()
    {
        $this->links = AsideLinks::links();
    }

    public function render()
    {
        return view('components.admin.aside-component');
    }
}
