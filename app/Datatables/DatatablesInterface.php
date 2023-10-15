<?php

namespace App\Datatables;

use Illuminate\Database\Eloquent\Builder;

interface DatatablesInterface
{
    public static function columns(): array;

    public function datatables($request);

    public function query($request): Builder;
}
