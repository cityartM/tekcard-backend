<?php

namespace Modules\GlobalSetting\Support\Enum;

class ContactType
{

    const ICONCONTACT = 'Icon contact';

    const SOCIALMEDIA = 'Social Media';
    const CONTACTINFO = 'Contact Info';
    const RECOMMENDED = 'Recommended';
    const BUSINESS = 'Business';
    const PERSONNEL = 'Personnel';

    public static function lists()
    {
        return [
            self::SOCIALMEDIA => trans('app.contactTypes.'.self::SOCIALMEDIA),
            self::CONTACTINFO => trans('app.contactTypes.'. self::CONTACTINFO),
            self::RECOMMENDED => trans('app.contactTypes.'. self::RECOMMENDED),
            self::BUSINESS => trans('app.contactTypes.'. self::BUSINESS),
            self::PERSONNEL => trans('app.contactTypes.'. self::PERSONNEL),
        ];
    }
}
