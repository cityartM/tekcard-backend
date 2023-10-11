<?php

namespace App\Support\Enum;

class UserStatus
{
    const UNCONFIRMED = 'Unconfirmed';
    const ACTIVE = 'Active';
    const BANNED = 'Banned';
    const MALE = 'Male';
    const FEMALE = 'Female';

    public static function lists()
    {
        return [
            self::ACTIVE => trans('app.status.'.self::ACTIVE),
            self::BANNED => trans('app.status.'. self::BANNED),
            self::UNCONFIRMED => trans('app.status.' . self::UNCONFIRMED)
        ];
    }

    public static function gender()
    {
        return [
            self::MALE => trans('app.gender.'.self::MALE),
            self::FEMALE => trans('app.gender.'. self::FEMALE),
        ];
    }
}
