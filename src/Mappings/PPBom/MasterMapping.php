<?php

namespace PcbKingdee\Mappings\PPBom;

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
            'name' => 'prd_org_id',
            'attribute' => 'FPrdOrgId',
            'field' => 'FPrdOrgId',
            'type' => 'int',
            'comment' => '生产组织',
        ],
        [
            'name' => 'prd_org_number',
            'attribute' => 'FPrdOrgId.FNumber',
            'field' => 'FPrdOrgId.FNumber',
            'type' => 'string',
            'comment' => '生产组织',
        ],
        [
            'name' => 'prd_org_name',
            'attribute' => 'FPrdOrgId.FName',
            'field' => 'FPrdOrgId.FName',
            'type' => 'string',
            'comment' => '生产组织',
        ],
        [
            'name' => 'mfg_order_id',
            'attribute' => 'FMoId',
            'field' => 'FMoId',
            'type' => 'int',
            'comment' => '生产订单',
        ],
        [
            'name' => 'mfg_order_entry_id',
            'attribute' => 'FMoEntryId',
            'field' => 'FMoEntryId',
            'type' => 'int',
            'comment' => '生产订单',
        ],
        [
            'name' => 'mfg_order_number',
            'attribute' => 'FMoBillNo',
            'field' => 'FMoBillNo',
            'type' => 'string',
            'comment' => '生产订单',
        ],
        [
            'name' => 'mfg_order_seq',
            'attribute' => 'FMoEntrySeq',
            'field' => 'FMoEntrySeq',
            'type' => 'int',
            'comment' => '生产订单',
        ],
        [
            'name' => 'mfg_order_status',
            'attribute' => 'FMoEntryStatus',
            'field' => 'FMoEntryStatus',
            'type' => 'string',
            'comment' => '生产订单状态',
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
            'attribute' => 'FDescription',
            'field' => 'FDescription',
            'type' => 'string',
            'comment' => '备注',
        ],
        [
            'name' => 'creator_id',
            'attribute' => 'FCreatorId',
            'field' => 'FCreatorId',
            'type' => 'int',
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
        [
            'name' => 'sales_order_number',
            'attribute' => 'FSaleOrderNo',
            'field' => 'FSaleOrderNo',
            'type' => 'string',
            'comment' => '销售订单',
        ],
        [
            'name' => 'sales_order_seq',
            'attribute' => 'FSaleOrderEntrySeq',
            'field' => 'FSaleOrderEntrySeq',
            'type' => 'int',
            'comment' => '销售订单',
        ],
    ];
}
