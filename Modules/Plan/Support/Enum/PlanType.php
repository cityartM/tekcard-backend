<?php

namespace Modules\Plan\Support\Enum;

class PlanType
{
    const COMPANY = 'Company';
    const CLIENT = 'Client';

    public static function lists()
    {
        return [
            self::COMPANY => trans('app.planTypes.'.self::COMPANY),
            self::CLIENT => trans('app.planTypes.'. self::CLIENT),
        ];
    }
}
