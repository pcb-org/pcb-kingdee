<?php

namespace PcbKingdee\Enums;

class MfgOrderPickMtrlStatusEnum
{
    const PENDING = '1';
    const SEMI_PICKED = '2';
    const PICKED = '3';
    const ULTRA_PICKED = '4';

    private static $mapping = [
        self::PENDING => '未领料',
        self::SEMI_PICKED => '部分领料',
        self::PICKED => '全部领料',
        self::ULTRA_PICKED => '超额领料',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
