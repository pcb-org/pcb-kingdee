<?php

namespace PcbKingdee\Enums;

class UserTypeEnum
{
    const INTERNAL = '1';
    const EXTERNAL = '2';

    private static $mapping = [
        self::INTERNAL => '内部',
        self::EXTERNAL => '外部',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
