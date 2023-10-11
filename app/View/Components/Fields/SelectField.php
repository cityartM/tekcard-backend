<?php

namespace App\View\Components\Fields;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class SelectField extends Component
{
    public ?string $col;
    public ?string $name;
    public ?string $title;
    public ?string $required;
    public ?Model $model;
    public ?Collection $data;
    public ?bool $multi;
    public ?bool $isselect2;
    public ?Collection $multidata;

    public function __construct(
        ?string     $col = null,
        ?string     $name = null,
        ?string     $title = null,
        ?string     $required = null,
        ?string     $isselect2 = null,
        ?Model      $model = null,
        ?Collection $data = null,
        ?Collection $multidata = null,
        ?bool $multi = false
    )
    {
        //
        $this->col = $col;
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->model = $model;
        $this->data = $data;
        $this->isselect2 = $isselect2;
        $this->multi = $multi;
        $this->multidata = $multidata;
    }

    public function render()
    {
        return view('components.fields.select-field')->with([
            "data" => $this->data->toArray(),
        ]);
    }
}
