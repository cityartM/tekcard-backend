<?php


namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class CountryKeywordSearch implements Filter
{
    public function __invoke(Builder $query, $search, string $property = '')
    {
        $query->where(function ($q) use ($search) {
            $q->where('name_en', "like", "%{$search}%");
            $q->orWhere('name_ar', 'like', "%{$search}%");
            $q->orWhere('calling_code', 'like', "%{$search}%");
            $q->orWhere('currency', 'like', "%{$search}%");
        });
    }
}

