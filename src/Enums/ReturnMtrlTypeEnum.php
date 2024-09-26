<?php

namespace PcbKingdee\Enums;

class ReturnMtrlTypeEnum
{
    const CONFORMING = '1';
    const NON_CONFORMING_INCOMING = '2';
    const NON_CONFORMING_WORK = '3';

    private static $mapping = [
        self::CONFORMING => '良品退料',
        self::NON_CONFORMING_INCOMING => '来料不良退料',
        self::NON_CONFORMING_WORK => '作业不良退料',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
