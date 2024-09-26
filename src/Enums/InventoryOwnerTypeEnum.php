<?php

namespace PcbKingdee\Enums;

class InventoryOwnerTypeEnum
{
    const OWNERORG = 'BD_OwnerOrg';
    const CUSTOMER = 'BD_Customer';

    private static $mapping = [
        self::OWNERORG => '业务组织',
        self::CUSTOMER => '客户',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
