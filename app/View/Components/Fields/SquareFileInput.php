<?php

namespace App\View\Components\Fields;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class SquareFileInput extends Component
{
    public ?string $title;
    public ?string $required;
    public ?string $name;
    public ?string $collection;
    public ?Model $model;

    public function __construct(
        ?string $name = null,
        ?string $title = null,
        ?string $required = null,
        ?string $collection = null,
        ?Model  $model = null
    )
    {
        //
        $this->title = $title;
        $this->required = $required;
        $this->name = $name;
        $this->collection = $collection;
        $this->model = $model;
    }

    public function render()
    {
        return view('components.fields.square-file-input');
    }
}
