<?php

namespace PcbKingdee\Enums;

class UserForbidStatusEnum
{
    const NO = 'A';
    const YES = 'B';

    private static $mapping = [
        self::NO => '否',
        self::YES => '是',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
