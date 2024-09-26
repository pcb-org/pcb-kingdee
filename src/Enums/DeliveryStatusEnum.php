<?php

namespace PcbKingdee\Enums;

class DeliveryStatusEnum
{
    const PENDING = 'A';
    const SEMI_DELIVERED = 'B';
    const DELIVERED = 'C';

    private static $mapping = [
        self::PENDING => '未发货',
        self::SEMI_DELIVERED => '部分发货',
        self::DELIVERED => '已发货',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
