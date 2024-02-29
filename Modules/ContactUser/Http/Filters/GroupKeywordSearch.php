<?php

namespace Modules\ContactUser\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class GroupKeywordSearch implements Filter
{
    public function __invoke(Builder $query, $search, string $property = '')
    {
        $query->where(function ($q) use ($search) {
            $q->where('display_name', "like", "%{$search}%");
        });
    }
}
