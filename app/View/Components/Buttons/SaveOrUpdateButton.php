<?php

namespace App\View\Components\Buttons;

use Illuminate\View\Component;

class SaveOrUpdateButton extends Component
{
    public string  $label;
    public string  $progress;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $label , string $progress)
    {
        $this->label = $label;
        $this->progress = $progress;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.buttons.save-or-update-button');
    }
}
