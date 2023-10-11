<?php

namespace App\View\Components\Fields;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\Component;
use Illuminate\View\View;

class TextField extends Component
{
    public string $index;
    public string $locale;
    public ?string $col;
    public string $title;
    public string $name;
    public $model;
    public bool $required;


    public function __construct(string $index, string $locale, string $title, string $name, $model = null, $required = false, ?string $col = null)
    {
        $this->index = $index;
        $this->locale = $locale;
        $this->col = $col;
        $this->title = $title;
        $this->model = $model;
        $this->name = $name;
        $this->required = $required;
    }

    public function render()
    {
        return view('components.fields.text-field');
    }
}
