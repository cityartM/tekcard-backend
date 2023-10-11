<?php

namespace App\Support\Enum;

class StrategyDay
{
    const FIRST_DAY = 1;
    const SECOND_DAY = 2;
    const THIRD_DAY = 3;
    const FOURTH_DAY = 4;
    const FIFTH_DAY = 5;
    const SIXTH_DAY = 6;
    const SEVENTH_DAY = 7;
    const EIGHTH_DAY = 8;
    const NINTH_DAY = 9;
    const TENTH_DAY =  10;
    const ELEVENTH_DAY =  11;
    const TWELFTH_DAY =  12;
    const THIRTEENTH_DAY =  13;
    const FOURTEENTH_DAY =  14;
    const FIFTEENTH_DAY =  15;
    const SIXTEENTH_DAY =  16;
    const SEVENTEENTH_DAY =  17;
    const EIGHTEENTH_DAY =  18;
    const NINETEENTH_DAY =  19;
    const TWENTIETH_DAY =  20;
    const TWENTY_FIRST_DAY =  21;
    const TWENTY_SECOND_DAY =  22;
    const TWENTY_THIRD_DAY =  23;
    const TWENTY_FOURTH_DAY =  24;
    const TWENTY_FIFTH_DAY =  25;
    const TWENTY_SIXTH_DAY =  26;
    const TWENTY_SEVENTH_DAY =  27;
    const TWENTY_EIGHTH_DAY =  28;
    const TWENTY_NINTH_DAY =  29;
    const THIRTIETH_DAY =  30;

    public static function lists()
    {
        return [
            self::FIRST_DAY => trans('app.days.'.self::FIRST_DAY),
            self::SECOND_DAY => trans('app.days.'.self::SECOND_DAY),
            self::THIRD_DAY => trans('app.days.'.self::THIRD_DAY),
            self::FOURTH_DAY => trans('app.days.'.self::FOURTH_DAY),
            self::FIFTH_DAY => trans('app.days.'.self::FIFTH_DAY),
            self::SIXTH_DAY => trans('app.days.'.self::SIXTH_DAY),
            self::SEVENTH_DAY => trans('app.days.'.self::SEVENTH_DAY),
            self::EIGHTH_DAY => trans('app.days.'.self::EIGHTH_DAY),
            self::NINTH_DAY => trans('app.days.'.self::NINTH_DAY),
            self::TENTH_DAY => trans('app.days.'.self::TENTH_DAY),
            self::ELEVENTH_DAY => trans('app.days.'.self::ELEVENTH_DAY),
            self::TWELFTH_DAY => trans('app.days.'.self::TWELFTH_DAY),
            self::THIRTEENTH_DAY => trans('app.days.'.self::THIRTEENTH_DAY),
            self::FOURTEENTH_DAY => trans('app.days.'.self::FOURTEENTH_DAY),
            self::FIFTEENTH_DAY => trans('app.days.'.self::FIFTEENTH_DAY),
            self::SIXTEENTH_DAY => trans('app.days.'.self::SIXTEENTH_DAY),
            self::SEVENTEENTH_DAY => trans('app.days.'.self::SEVENTEENTH_DAY),
            self::EIGHTEENTH_DAY => trans('app.days.'.self::EIGHTEENTH_DAY),
            self::NINETEENTH_DAY => trans('app.days.'.self::NINETEENTH_DAY),
            self::TWENTIETH_DAY => trans('app.days.'.self::TWENTIETH_DAY),
            self::TWENTY_FIRST_DAY => trans('app.days.'.self::TWENTY_FIRST_DAY),
            self::TWENTY_SECOND_DAY => trans('app.days.'.self::TWENTY_SECOND_DAY),
            self::TWENTY_THIRD_DAY => trans('app.days.'.self::TWENTY_THIRD_DAY),
            self::TWENTY_FOURTH_DAY => trans('app.days.'.self::TWENTY_FOURTH_DAY),
            self::TWENTY_FIFTH_DAY => trans('app.days.'.self::TWENTY_FIFTH_DAY),
            self::TWENTY_SIXTH_DAY => trans('app.days.'.self::TWENTY_SIXTH_DAY),
            self::TWENTY_SEVENTH_DAY => trans('app.days.'.self::TWENTY_SEVENTH_DAY),
            self::TWENTY_EIGHTH_DAY => trans('app.days.'.self::TWENTY_EIGHTH_DAY),
            self::TWENTY_NINTH_DAY => trans('app.days.'.self::TWENTY_NINTH_DAY),
            self::THIRTIETH_DAY => trans('app.days.'.self::THIRTIETH_DAY),
        ];
    }

    const DAYS = [
        '1', '2', '3', '4', '5',
        '6', '7', '8', '9', '10',
        '11', '12', '13', '14', '15',
        '16', '17', '18', '19', '20',
        '21', '22', '23', '24', '25',
        '26', '27', '28', '29', '30',
    ];
}
