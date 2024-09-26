<?php

namespace PcbKingdee\Mappings\SalesOrder;

class EntryMapping
{
    /**
     * @var array
     */
    public static $mapping = [
        [
            'name' => 'entry_id',
            'attribute' => 'FSaleOrderEntry_FEntryId',
            'field' => 'FEntryId',
            'type' => 'int',
            'comment' => '分录内码',
        ],
        [
            'name' => 'seq',
            'attribute' => 'FSaleOrderEntry_FSeq',
            'field' => 'FSeq',
            'type' => 'int',
            'comment' => '行号',
        ],
        [
            'name' => 'material_id',
            'attribute' => 'FMaterialId',
            'field' => 'FMaterialId',
            'type' => 'int',
            'comment' => '物料',
        ],
        [
            'name' => 'material_number',
            'attribute' => 'FMaterialId.FNumber',
            'field' => 'FMaterialId.FNumber',
            'type' => 'string',
            'comment' => '物料',
        ],
        [
            'name' => 'material_name',
            'attribute' => 'FMaterialId.FName',
            'field' => 'FMaterialId.FName',
            'type' => 'string',
            'comment' => '物料',
        ],
        [
            'name' => 'material_spec',
            'attribute' => 'FMaterialId.FSpecification',
            'field' => 'FMaterialId.FSpecification',
            'type' => 'string',
            'comment' => '规格',
        ],
        [
            'name' => 'unit_id',
            'attribute' => 'FUnitId',
            'field' => 'FUnitId',
            'type' => 'int',
            'comment' => '单位',
        ],
        [
            'name' => 'unit_number',
            'attribute' => 'FUnitId.FNumber',
            'field' => 'FUnitId.FNumber',
            'type' => 'string',
            'comment' => '单位',
        ],
        [
            'name' => 'unit_name',
            'attribute' => 'FUnitId.FName',
            'field' => 'FUnitId.FName',
            'type' => 'string',
            'comment' => '单位',
        ],
        [
            'name' => 'qty',
            'attribute' => 'FQty',
            'field' => 'FQty',
            'type' => 'int',
            'comment' => '销售数量',
        ],
        [
            'name' => 'base_unit_qty',
            'attribute' => 'FBaseUnitQty',
            'field' => 'FBaseUnitQty',
            'type' => 'int',
            'comment' => '基本单位销售数量',
        ],
        [
            'name' => 'delivery_date',
            'attribute' => 'FDeliveryDate',
            'field' => 'FDeliveryDate',
            'type' => 'string',
            'comment' => '要货日期',
        ],
        [
            'name' => 'bom_id',
            'attribute' => 'FBomId',
            'field' => 'FBomId',
            'type' => 'int',
            'comment' => 'BOM版本',
        ],
        [
            'name' => 'bom_number',
            'attribute' => 'FBomId.FNumber',
            'field' => 'FBomId.FNumber',
            'type' => 'string',
            'comment' => 'BOM版本',
        ],
        [
            'name' => 'bom_name',
            'attribute' => 'FBomId.FName',
            'field' => 'FBomId.FName',
            'type' => 'string',
            'comment' => 'BOM版本',
        ],
        [
            'name' => 'delivery_status',
            'attribute' => 'FDeliveryStatus',
            'field' => 'FDeliveryStatus',
            'type' => 'string',
            'comment' => '发货状态',
        ],
        [
            'name' => 'can_out_qty',
            'attribute' => 'FCanOutQty',
            'field' => 'FCanOutQty',
            'type' => 'int',
            'comment' => '可出数量',
        ],
        [
            'name' => 'base_can_out_qty',
            'attribute' => 'FBaseCanOutQty',
            'field' => 'FBaseCanOutQty',
            'type' => 'int',
            'comment' => '基本单位可出数量',
        ],
        [
            'name' => 'remain_out_qty',
            'attribute' => 'FRemainOutQty',
            'field' => 'FRemainOutQty',
            'type' => 'int',
            'comment' => '剩余未出数量',
        ],
        [
            'name' => 'base_remain_out_qty',
            'attribute' => 'FBaseRemainOutQty',
            'field' => 'FBaseRemainOutQty',
            'type' => 'int',
            'comment' => '基本单位剩余未出数量',
        ],
    ];
}
