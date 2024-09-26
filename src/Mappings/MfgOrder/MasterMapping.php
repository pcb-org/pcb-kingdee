<?php

namespace PcbKingdee\Mappings\MfgOrder;

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
            'name' => 'owner_type_id',
            'attribute' => 'FOwnerTypeId',
            'field' => 'FOwnerTypeId',
            'type' => 'string',
            'comment' => '货主类型',
        ],
        [
            'name' => 'owner_id',
            'attribute' => 'FOwnerId',
            'field' => 'FOwnerId',
            'type' => 'int',
            'comment' => '货主',
        ],
        [
            'name' => 'owner_number',
            'attribute' => 'FOwnerId.FNumber',
            'field' => 'FOwnerId.FNumber',
            'type' => 'string',
            'comment' => '货主',
        ],
        [
            'name' => 'owner_name',
            'attribute' => 'FOwnerId.FName',
            'field' => 'FOwnerId.FName',
            'type' => 'string',
            'comment' => '货主',
        ],
        [
            'name' => 'is_rework',
            'attribute' => 'FIsRework',
            'field' => 'FIsRework',
            'type' => 'bool',
            'comment' => '是否返工',
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
        [
            'name' => 'customer_name',
            'attribute' => 'F_ORA_MulLangText',
            'field' => 'F_ORA_MulLangText',
            'type' => 'string',
            'comment' => '客户名称',
        ],
        [
            'name' => 'salesman_name',
            'attribute' => 'F_ORA_MulLangText1',
            'field' => 'F_ORA_MulLangText1',
            'type' => 'string',
            'comment' => '销售员名称',
        ],
        [
            'name' => 'kitting_remark',
            'attribute' => 'F_ORA_Remarks',
            'field' => 'F_ORA_Remarks',
            'type' => 'string',
            'comment' => '齐套备注',
        ],
    ];
}
