<?php

namespace App\Support\Enum;

class UserRoles
{
    const ADMIN = 'Admin';
    const USER = 'User';

    public static function lists()
    {
        return [
            self::ADMIN => trans('app.roles.'.self::ADMIN),
            self::USER => trans('app.roles.'. self::USER),
        ];
    }
}
