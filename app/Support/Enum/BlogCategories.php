<?php

namespace App\Support\Enum;

class BlogCategories
{
    const TECHNICAL = 'Technical';
    const LIFESTYLE = 'Lifestyle';
    const TRAVEL = 'Travel';
    const FOOD = 'Food';
    const FASHION = 'Fashion';
    const HEALTH = 'Health';
    const ENTERTAINMENT = 'Entertainment';
    const SPORTS = 'Sports';
    const BUSINESS = 'Business';
    const POLITICS = 'Politics';
    const OTHER = 'Other';

    public static function lists()
    {
        return [

            self::TECHNICAL => trans('app.categories.' . self::TECHNICAL),
            self::LIFESTYLE => trans('app.categories.' . self::LIFESTYLE),
            self::TRAVEL => trans('app.categories.' . self::TRAVEL),
            self::FOOD => trans('app.categories.' . self::FOOD),
            self::FASHION => trans('app.categories.' . self::FASHION),
            self::HEALTH => trans('app.categories.' . self::HEALTH),
            self::ENTERTAINMENT => trans('app.categories.' . self::ENTERTAINMENT),
            self::SPORTS => trans('app.categories.' . self::SPORTS),
            self::BUSINESS => trans('app.categories.' . self::BUSINESS),
            self::POLITICS => trans('app.categories.' . self::POLITICS),
            self::OTHER => trans('app.categories.' . self::OTHER),

        ];
    }


}
