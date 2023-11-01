<?php



namespace App\Support\Enum;

class BackgroundType
{
    const SHARE = 'Share';
    const CARD = 'Card';

    public static function lists()
    {
        return [
            self::SHARE => trans('app.backgroundTypes.'.self::SHARE),
            self::CARD => trans('app.backgroundTypes.'.self::CARD),
        ];
    }
}
