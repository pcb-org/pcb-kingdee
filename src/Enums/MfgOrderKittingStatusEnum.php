<?php

namespace PcbKingdee\Enums;

class MfgOrderKittingStatusEnum
{
    const YES = 'A';
    const NO = 'B';

    private static $mapping = [
        self::YES => '齐',
        self::NO => '不齐',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
