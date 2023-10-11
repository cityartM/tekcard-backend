<?php

namespace App\View\Components\Datatable;

use Illuminate\View\Component;

class SearchInput extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('components.data-table.search-input');
    }
}
