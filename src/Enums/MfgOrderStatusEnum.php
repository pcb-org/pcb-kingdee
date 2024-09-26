<?php

namespace PcbKingdee\Enums;

class MfgOrderStatusEnum
{
    const PLANNED = '1';
    const PLAN_CONFIRMED = '2';
    const SCHEDULED = '3';
    const STARTED = '4';
    const COMPLETED = '5';
    const CLOSED = '6';
    const SETTLED = '7';

    private static $mapping = [
        self::PLANNED => '计划',
        self::PLAN_CONFIRMED => '计划确认',
        self::SCHEDULED => '下达',
        self::STARTED => '开工',
        self::COMPLETED => '完工',
        self::CLOSED => '结案',
        self::SETTLED => '结算',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
