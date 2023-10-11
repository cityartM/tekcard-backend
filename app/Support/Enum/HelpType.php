<?php

namespace App\Support\Enum;

class HelpType
{
    const PAYMENT = 'payment';

    public static function lists()
    {
        return [
            self::PAYMENT => trans('app.help_types.'.self::PAYMENT),
        ];
    }

    const TYPES = [
        'payment',
    ]; 
}