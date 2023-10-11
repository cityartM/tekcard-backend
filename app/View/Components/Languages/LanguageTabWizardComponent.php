<?php

namespace App\View\Components\Languages;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\Component;
use Illuminate\View\View;

class LanguageTabWizardComponent extends Component
{

    public ?string $id;

    public ?string $step;


    public function __construct(?string $id = null,?string $step = null)
    {
        $this->id = $id;
        $this->step = $step;
    }

    public function render()
    {
        return view('components.languages.language-tab-wizard');
    }
}
