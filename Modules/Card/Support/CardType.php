<?php

namespace Modules\Card\Support;

class CardType
{
    const PERSON = 'Person';
    const WORK = 'Work';

    public static function lists()
    {
        return [
            self::PERSON => trans('app.cardType.'.self::PERSON),
            self::WORK => trans('app.cardType.'. self::WORK),
        ];
    }
}
