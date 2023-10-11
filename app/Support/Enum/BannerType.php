<?php

namespace App\Support\Enum;

class BannerType
{
    const EXTERNAL = 'External';
    const INTERNAL = 'Internal';
    const NONE = 'None';

    public static function lists()
    {
        return [
            self::EXTERNAL => trans('app.banner.'.self::EXTERNAL),
            self::INTERNAL => trans('app.banner.'. self::INTERNAL),
            self::NONE => trans('app.banner.'. self::NONE),
        ];
    }
}
