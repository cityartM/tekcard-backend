<?php

namespace Modules\Card\Support;

class ContactAppsType
{
    const LINK = 'Link';
    const CALL = 'Call';
    const MAIL = 'Mail';



    public static function lists()
    {
        return [
            self::LINK => trans('app.contactAppsType.'.self::LINK),
            self::CALL => trans('app.contactAppsType.'. self::CALL),
            self::MAIL => trans('app.contactAppsType.'. self::MAIL),
        ];
    }

    public static function listsWitoutTrans()
    {
        return [
            self::LINK => self::LINK,
            self::CALL => self::CALL,
            self::MAIL => self::MAIL,
        ];
    }
}
