<?php

namespace PcbKingdee\Mappings\DeliveryNotice;

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
            'name' => 'date',
            'attribute' => 'FDate',
            'field' => 'FDate',
            'type' => 'string',
            'comment' => '日期',
        ],
        [
            'name' => 'sales_org_id',
            'attribute' => 'FSaleOrgId',
            'field' => 'FSaleOrgId',
            'type' => 'int',
            'comment' => '销售组织',
        ],
        [
            'name' => 'sales_org_number',
            'attribute' => 'FSaleOrgId.FNumber',
            'field' => 'FSaleOrgId.FNumber',
            'type' => 'string',
            'comment' => '销售组织',
        ],
        [
            'name' => 'sales_org_name',
            'attribute' => 'FSaleOrgId.FName',
            'field' => 'FSaleOrgId.FName',
            'type' => 'string',
            'comment' => '销售组织',
        ],
        [
            'name' => 'customer_id',
            'attribute' => 'FCustomerId',
            'field' => 'FCustomerId',
            'type' => 'int',
            'comment' => '客户',
        ],
        [
            'name' => 'customer_number',
            'attribute' => 'FCustomerId.FNumber',
            'field' => 'FCustomerId.FNumber',
            'type' => 'string',
            'comment' => '客户',
        ],
        [
            'name' => 'customer_name',
            'attribute' => 'FCustomerId.FName',
            'field' => 'FCustomerId.FName',
            'type' => 'string',
            'comment' => '客户',
        ],
        [
            'name' => 'business_type',
            'attribute' => 'FBussinessType',
            'field' => 'FBussinessType',
            'type' => 'string',
            'comment' => '业务类型',
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
