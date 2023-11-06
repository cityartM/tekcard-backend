<?php

namespace Modules\Card\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class CardContactKeywordSearch implements Filter
{
    public function __invoke(Builder $query, $search, string $property = '')
    {
        $query->whereHas('card', function ($q) use ($search) {
            $q->where('full_name', "like", "%{$search}%");
        });
    }
}
