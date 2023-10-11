<?php


namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;
use Spatie\QueryBuilder\Filters\Filter;

class NotificationKeywordSearch implements Filter
{
    public function __invoke(Builder $query, $search, string $property = '')
    {


            $query->where(function ($q) use ($search) {
                $q->where('notifiable_type', "like", "%{$search}%");
            });
    }

}

