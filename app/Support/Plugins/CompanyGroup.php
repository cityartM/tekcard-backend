<?php

namespace App\Support\Plugins;

use Vanguard\Plugins\Plugin;
use App\Support\Sidebar\Item;

class CompanyGroup extends Plugin
{
    public function sidebar()
    {
        return Item::create(__('app.Company_group'))
            ->route('companygroups.index')
            ->icon('<span class="svg-icon svg-icon-2"><i class="fa fa-cubes mx-1"></i></span>')
            ->active("companies*")
            ->permissions('companies.manage');
    }
}
