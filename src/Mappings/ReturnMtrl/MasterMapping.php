<?php

namespace PcbKingdee\Mappings\ReturnMtrl;

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
            'attribute' => 'FBillType',
            'field' => 'FBillType',
            'type' => 'string',
            'comment' => '单据类型',
        ],
        [
            'name' => 'bill_type_number',
            'attribute' => 'FBillType.FNumber',
            'field' => 'FBillType.FNumber',
            'type' => 'string',
            'comment' => '单据类型',
        ],
        [
            'name' => 'bill_type_name',
            'attribute' => 'FBillType.FName',
            'field' => 'FBillType.FName',
            'type' => 'string',
            'comment' => '单据类型',
        ],
        [
            'name' => 'date',
            'attribute' => 'FDate',
            'field' => 'FDate',
            'type' => 'string',
            'comment' => '日期',
        ],
        [
            'name' => 'document_status',
            'attribute' => 'FDocumentStatus',
            'field' => 'FDocumentStatus',
            'type' => 'string',
            'comment' => '单据状态',
        ],
        [
            'name' => 'stock_org_id',
            'attribute' => 'FStockOrgId',
            'field' => 'FStockOrgId',
            'type' => 'int',
            'comment' => '生产组织',
        ],
        [
            'name' => 'stock_org_number',
            'attribute' => 'FStockOrgId.FNumber',
            'field' => 'FStockOrgId.FNumber',
            'type' => 'string',
            'comment' => '生产组织',
        ],
        [
            'name' => 'stock_org_name',
            'attribute' => 'FStockOrgId.FName',
            'field' => 'FStockOrgId.FName',
            'type' => 'string',
            'comment' => '生产组织',
        ],
        [
            'name' => 'note',
            'attribute' => 'FDescription',
            'field' => 'FDescription',
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
