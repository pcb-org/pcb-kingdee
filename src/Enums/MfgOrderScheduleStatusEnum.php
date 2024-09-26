<?php

namespace PcbKingdee\Enums;

class MfgOrderScheduleStatusEnum
{
    const PENDING = '1';
    const SEMI_SCHEDULED = '2';
    const SCHEDULED = '3';

    private static $mapping = [
        self::PENDING => '未排产',
        self::SEMI_SCHEDULED => '部分排产',
        self::SCHEDULED => '全部排产',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
