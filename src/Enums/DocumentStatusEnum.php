<?php

namespace PcbKingdee\Enums;

class DocumentStatusEnum
{
    const DRAFT = 'Z';
    const CREATED = 'A';
    const WAITING_APPROVAL = 'B';
    const APPROVED = 'C';
    const WAITING_REAPPROVAL = 'D';

    private static $mapping = [
        self::DRAFT => '暂存',
        self::CREATED => '创建',
        self::WAITING_APPROVAL => '待审核',
        self::APPROVED => '已审核',
        self::WAITING_REAPPROVAL => '重新审核',
    ];

    public static function getLabel($value)
    {
        return isset(self::$mapping[$value]) ? self::$mapping[$value] : null;
    }
}
