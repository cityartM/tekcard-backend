<?php



namespace App\Support\Enum;

class BackgroundType
{
    const SHARE = 'share';
    const CARD = 'card';

    public static function lists()
    {
        return [
            self::SHARE => trans('app.type.' . self::SHARE),
            self::CARD => trans('app.type.' . self::CARD),
        ];
    }
}