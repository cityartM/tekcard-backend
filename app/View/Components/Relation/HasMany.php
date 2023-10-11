<?php

namespace App\View\Components\Relation;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class HasMany extends Component
{
    public ?string $col;
    public ?string $name;
    public ?string $title;
    public ?string $required;
    public ?Collection $data;
    public ?Collection $relationdata;

    public function __construct(
        ?string     $col = null,
        ?string     $name = null,
        ?string     $title = null,
        ?string     $required = null,
        ?Collection $data = null,
        ?Collection $relationdata = null
    )
    {
        //
        $this->col = $col;
        $this->name = $name;
        $this->title = $title;
        $this->required = $required;
        $this->data = $data;
        $this->relationdata = $relationdata;
    }

    public function render()
    {
        return view('components.relation.has-many')->with([
            "data" => $this->data->toArray(),
        ]);
    }
}
