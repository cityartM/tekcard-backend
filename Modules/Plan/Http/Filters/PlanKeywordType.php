<?php

namespace Modules\Plan\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class PlanKeywordType implements Filter
{
    public function __invoke(Builder $query, $type, string $property = '')
    {
        $query->where(function ($q) use ($type) {
            $q->where('type',$type);
        });
    }
}
