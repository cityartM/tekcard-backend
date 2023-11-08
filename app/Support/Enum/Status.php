<?php

namespace App\Support\Enum;

class Status
{
    const PUBLISHED = 'published';
    const UNPUBLISHED = 'unpublished';

    public static function lists()
    {
        return [
            self::PUBLISHED => trans('app.blogStatus.' . self::PUBLISHED),
            self::UNPUBLISHED => trans('app.blogStatus.' . self::UNPUBLISHED),
        ];
    }
}
