<?php

namespace App\Support\Enum;

class CurrencyStatus
{
    const ACTIVE = 'Active';
    const NONACTIVE = 'Inactive';

    public static function lists(): array
    {
        return [
            self::ACTIVE => trans('app.currency_status.'.self::ACTIVE),
            self::NONACTIVE => trans('app.currency_status.'. self::NONACTIVE),
        ];
    }
}
