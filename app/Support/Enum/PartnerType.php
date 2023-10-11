<?php

namespace App\Support\Enum;

class PartnerType
{
    const ESTATE_AGENCY = 'Estate Agency';
    const PROMOTER = 'Promoter';

    public static function lists()
    {
        return [
            self::ESTATE_AGENCY => trans('app.partners.'.self::ESTATE_AGENCY),
            self::PROMOTER => trans('app.partners.'. self::PROMOTER),
        ];
    }
}
