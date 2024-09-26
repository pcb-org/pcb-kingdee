<?php

namespace PcbKingdee\Mappings\Miscellaneous;

class MasterMapping
{
    /**
     * @var array
     */
    public static $mapping = [
        [
            'name' => 'id',
            'attribute' => 'FId',
            'field' => 'FId',
            'type' => 'int',
            'comment' => '单据内码',
        ],
        [
            'name' => 'bill_number',
            'attribute' => 'FBillNo',
            'field' => 'FBillNo',
            'type' => 'string',
            'comment' => '单据编号',
        ],
        [
            'name' => 'bill_type_id',
            'attribute' => 'FBillTypeId',
            'field' => 'FBillTypeId',
            'type' => 'string',
            'comment' => '单据类型',
        ],
        [
            'name' => 'bill_type_number',
            'attribute' => 'FBillTypeId.FNumber',
            'field' => 'FBillTypeId.FNumber',
            'type' => 'string',
            'comment' => '单据类型',
        ],
        [
            'name' => 'bill_type_name',
            'attribute' => 'FBillTypeId.FName',
            'field' => 'FBillTypeId.FName',
            'type' => 'string',
            'comment' => '单据类型',
        ],
        [
            'name' => 'stock_org_id',
            'attribute' => 'FStockOrgId',
            'field' => 'FStockOrgId',
            'type' => 'int',
            'comment' => '库存组织',
        ],
        [
            'name' => 'stock_org_number',
            'attribute' => 'FStockOrgId.FNumber',
            'field' => 'FStockOrgId.FNumber',
            'type' => 'string',
            'comment' => '库存组织',
        ],
        [
            'name' => 'stock_org_name',
            'attribute' => 'FStockOrgId.FName',
            'field' => 'FStockOrgId.FName',
            'type' => 'string',
            'comment' => '库存组织',
        ],
        [
            'name' => 'stock_direct',
            'attribute' => 'FStockDirect',
            'field' => 'FStockDirect',
            'type' => 'string',
            'comment' => '库存方向',
        ],
        [
            'name' => 'date',
            'attribute' => 'FDate',
            'field' => 'FDate',
            'type' => 'string',
            'comment' => '日期',
        ],
        [
            'name' => 'owner_type_id_head',
            'attribute' => 'FOwnerTypeIdHead',
            'field' => 'FOwnerTypeIdHead',
            'type' => 'string',
            'comment' => '货主类型',
        ],
        [
            'name' => 'owner_id_head',
            'attribute' => 'FOwnerIdHead',
            'field' => 'FOwnerIdHead',
            'type' => 'int',
            'comment' => '货主',
        ],
        [
            'name' => 'owner_number_head',
            'attribute' => 'FOwnerIdHead.FNumber',
            'field' => 'FOwnerIdHead.FNumber',
            'type' => 'string',
            'comment' => '货主',
        ],
        [
            'name' => 'owner_name_head',
            'attribute' => 'FOwnerIdHead.FName',
            'field' => 'FOwnerIdHead.FName',
            'type' => 'string',
            'comment' => '货主',
        ],
        [
            'name' => 'document_status',
            'attribute' => 'FDocumentStatus',
            'field' => 'FDocumentStatus',
            'type' => 'string',
            'comment' => '单据状态',
        ],
        [
            'name' => 'note',
            'attribute' => 'FNote',
            'field' => 'FNote',
            'type' => 'string',
            'comment' => '备注',
        ],
        [
            'name' => 'creator_id',
            'attribute' => 'FCreatorId',
            'field' => 'FCreatorId',
            'type' => 'string',
            'comment' => '创建人',
        ],
        [
            'name' => 'creator_name',
            'attribute' => 'FCreatorId.FName',
            'field' => 'FCreatorId.FName',
            'type' => 'string',
            'comment' => '创建人',
        ],
        [
            'name' => 'create_date',
            'attribute' => 'FCreateDate',
            'field' => 'FCreateDate',
            'type' => 'string',
            'comment' => '创建日期',
        ],
    ];
}
