<?php

namespace Modules\Card\Support;

class GroupType
{
    const PEOPLES = 'Peoples';
    const WORKS = 'Works';

    public static function lists()
    {
        return [
            self::PEOPLES => trans('app.groupType.'.self::PEOPLES),
            self::WORKS => trans('app.groupType.'. self::WORKS),
        ];
    }
}
