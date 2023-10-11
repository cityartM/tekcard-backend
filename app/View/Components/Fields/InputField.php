<?php

namespace App\View\Components\Fields;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class InputField extends Component
{
    public ?string $col;
    public ?string $name;
    public ?string $title;
    public ?string $placeholder;
    public ?string $required;
    public ?string $type;
    public ?string $hint;
    public ?string $value;
    public ?Model $model;

    public function __construct(
        ?string $col = null,
        ?string $name = null,
        ?string $title = null,
        ?string $placeholder = null,
        ?string $hint = null,
        ?string $value = null,
        ?string $required = null,
        ?string $type = null,
        ?Model  $model = null
    )
    {
        //
        $this->col = $col;
        $this->name = $name;
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->hint = $hint;
        $this->required = $required;
        $this->type = $type;
        $this->model = $model;
    }

    public function render()
    {
        return view('components.fields.input-field');
    }
}
