<?php

namespace PcbKingdee\Enums;

class MfgOrderReadyStatusEnum
{
    const NO = 'A';
    const YES = 'B';

    private static $mapping = [
        self::NO => '不符',
        self::YES => '符合',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
