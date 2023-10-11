<?php

namespace App\View\Components\Fields;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SummernoteField extends Component
{
    public ?string $col;
    public ?string $row;
    public string $title;
    public ?string $placeholder;
    public string $name;
    public ?string $hint;
    public $model;
    public bool $required;
    public ?bool $summernote;


    /**
     * @param string $title
     * @param string|null $placeholder
     * @param string $name
     * @param string|null $hint
     * @param $model
     * @param bool $required
     * @param string|null $col
     * @param string|null $row
     * @param bool|null $summernote
     */
    public function __construct(string $title, string $name, ?string $hint = null, $model = null, bool $required = false, ?string $col = null,?string $row = null, ?bool $summernote = false, ?string $placeholder = null)
    {
        $this->title = $title;
        $this->placeholder = $placeholder;
        $this->model = $model;
        $this->col = $col;
        $this->row = $row;
        $this->hint = $hint;
        $this->name = $name;
        $this->required = $required;
        $this->summernote = $summernote;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.fields.summernote-field');
    }
}
