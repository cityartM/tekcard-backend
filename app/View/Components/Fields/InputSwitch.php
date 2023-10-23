<?php

namespace App\View\Components\Fields;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class InputSwitch extends Component
{

    public ?string $title;
    public ?string $name;
    public ?string $status;
    public ?string $col;

    /**
     * @param string|null $title
     * @param string|null $name
     * @param string $status
     * @param string|null $col
     * @param bool|null $model
     */
    public function __construct(?string $title = null,?string $name = null, ?string $status = null ,?string $col = null)
    {
        $this->title = $title;
        $this->name = $name;
        $this->status = $status;
        $this->col = $col;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return Application|Factory|View
     */
    public function render()
    {
        return view('components.fields.switch-input');
    }
}
