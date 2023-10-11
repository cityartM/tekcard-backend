<?php

namespace App\View\Components\Fields;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\Component;
use Illuminate\View\View;

class TranslationSummernoteField extends Component
{
    public ?string $col;
    public string $title;
    public string $name;
    public $model;
    public bool $required;
    public ?bool $summernote;

    public function __construct(string $title, string $name, $model = null, bool $required = false, ?string $col = null, ?bool $summernote = false)
    {
        $this->title = $title;
        $this->model = $model;
        $this->col = $col;
        $this->name = $name;
        $this->required = $required;
        $this->summernote =$summernote;
    }

    public function render()
    {
        return view('components.fields.translation-summernote-field');
    }
}
