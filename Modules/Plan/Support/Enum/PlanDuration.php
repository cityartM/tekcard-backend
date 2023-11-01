<?php

namespace Modules\Plan\Support\Enum;

class PlanDuration
{
    const YEARLY = 'Yearly';
    const MONTHLY = 'Monthly';

    public static function lists()
    {
        return [
            self::YEARLY => trans('app.planDurations.'.self::YEARLY),
            self::MONTHLY => trans('app.planDurations.'. self::MONTHLY),
        ];
    }
}
