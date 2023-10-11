<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class PartnerKeywordSearch implements Filter
{
    public function __invoke(Builder $query, $search, string $property = '')
    {
        $query->where(function ($q) use ($search) {
            $q->where('name->ar', "like", "%{$search}%");
            $q->orWhere('name->fr', 'like', "%{$search}%");
            $q->orWhere('name->en', 'like', "%{$search}%");
        });
    }
}
