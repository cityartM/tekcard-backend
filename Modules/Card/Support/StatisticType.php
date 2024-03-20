<?php

namespace Modules\Card\Support;

class StatisticType
{
    const SHAREDLINK = 'Shared link';
    const SAVEDCONTACT = 'Saved contact';
    const OPENEDLINK = 'Opened link';
    const SHAREDLOCATION = 'Shared location';

    public static function lists()
    {
        return [
            self::SHAREDLINK => trans('app.statisticType.'.self::SHAREDLINK),
            self::SAVEDCONTACT => trans('app.statisticType.'. self::SAVEDCONTACT),
            self::OPENEDLINK => trans('app.statisticType.'. self::OPENEDLINK),
            self::SHAREDLOCATION => trans('app.statisticType.'. self::SHAREDLOCATION),
        ];
    }
}
