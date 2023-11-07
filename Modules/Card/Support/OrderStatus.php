<?php

namespace Modules\Card\Support;

class OrderStatus
{
    const PENDING = 'Pending';
    const SHIPPED = 'Shipped';

    public static function lists()
    {
        return [
            self::PENDING => trans('app.orderStatus.' . self::PENDING),
            self::SHIPPED => trans('app.orderStatus.' . self::SHIPPED),
        ];
    }
}
