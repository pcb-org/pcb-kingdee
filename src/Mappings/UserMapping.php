<?php

namespace PcbKingdee\Mappings;

class UserMapping
{
    /**
     * @var array
     */
    public static $mapping = [
        [
            'name' => 'id',
            'attribute' => 'FUserId',
            'field' => 'FUserId',
            'type' => 'int',
            'comment' => '单据内码',
        ],
        [
            'name' => 'name',
            'attribute' => 'FName',
            'field' => 'FName',
            'type' => 'string',
            'comment' => '用户名',
        ],
        [
            'name' => 'forbid_status',
            'attribute' => 'FForbidStatus',
            'field' => 'FForbidStatus',
            'type' => 'string',
            'comment' => '禁用状态',
        ],
        [
            'name' => 'user_type',
            'attribute' => 'FUserType',
            'field' => 'FUserType',
            'type' => 'string',
            'comment' => '用户类型',
        ],
    ];
}
