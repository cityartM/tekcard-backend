<?php

namespace App\View\Components\Languages;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\Component;
use Illuminate\View\View;

class LanguageTabComponent extends Component
{

    public ?string $id;

    public function __construct(?string $id = null)
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('components.languages.language-tab');
    }
}
