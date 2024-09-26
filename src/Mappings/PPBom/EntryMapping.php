<?php

namespace PcbKingdee\Mappings\PPBom;

class EntryMapping
{
    /**
     * @var array
     */
    public static $mapping = [
        [
            'name' => 'entry_id',
            'attribute' => 'FEntity_FEntryId',
            'field' => 'FEntryId',
            'type' => 'int',
            'comment' => '分录内码',
        ],
        [
            'name' => 'seq',
            'attribute' => 'FEntity_FSeq',
            'field' => 'FSeq',
            'type' => 'int',
            'comment' => '行号',
        ],
        [
            'name' => 'material_id',
            'attribute' => 'FMaterialId2',
            'field' => 'FMaterialId2',
            'type' => 'int',
            'comment' => '子项物料',
        ],
        [
            'name' => 'material_number',
            'attribute' => 'FMaterialId2.FNumber',
            'field' => 'FMaterialId2.FNumber',
            'type' => 'string',
            'comment' => '子项物料',
        ],
        [
            'name' => 'material_name',
            'attribute' => 'FMaterialId2.FName',
            'field' => 'FMaterialId2.FName',
            'type' => 'string',
            'comment' => '子项物料',
        ],
        [
            'name' => 'material_spec',
            'attribute' => 'FMaterialId2.FSpecification',
            'field' => 'FMaterialId2.FSpecification',
            'type' => 'string',
            'comment' => '子项物料规格',
        ],
        [
            'name' => 'unit_id',
            'attribute' => 'FUnitId2',
            'field' => 'FUnitId2',
            'type' => 'int',
            'comment' => '单位',
        ],
        [
            'name' => 'unit_number',
            'attribute' => 'FUnitId2.FNumber',
            'field' => 'FUnitId2.FNumber',
            'type' => 'string',
            'comment' => '单位',
        ],
        [
            'name' => 'unit_name',
            'attribute' => 'FUnitId2.FName',
            'field' => 'FUnitId2.FName',
            'type' => 'string',
            'comment' => '单位',
        ],
        [
            'name' => 'must_qty',
            'attribute' => 'FMustQty',
            'field' => 'FMustQty',
            'type' => 'int',
            'comment' => '应发数量',
        ],
        [
            'name' => 'picked_qty',
            'attribute' => 'FPickedQty',
            'field' => 'FPickedQty',
            'type' => 'int',
            'comment' => '已领数量',
        ],
        [
            'name' => 'no_picked_qty',
            'attribute' => 'FNoPickedQty',
            'field' => 'FNoPickedQty',
            'type' => 'int',
            'comment' => '未领数量',
        ],
        [
            'name' => 'base_unit_id',
            'attribute' => 'FBaseUnitId1',
            'field' => 'FBaseUnitId1',
            'type' => 'int',
            'comment' => '基本单位',
        ],
        [
            'name' => 'base_unit_number',
            'attribute' => 'FBaseUnitId1.FNumber',
            'field' => 'FBaseUnitId1.FNumber',
            'type' => 'string',
            'comment' => '基本单位',
        ],
        [
            'name' => 'base_unit_name',
            'attribute' => 'FBaseUnitId1.FName',
            'field' => 'FBaseUnitId1.FName',
            'type' => 'string',
            'comment' => '基本单位',
        ],
        [
            'name' => 'base_picked_qty',
            'attribute' => 'FBasePickedQty',
            'field' => 'FBasePickedQty',
            'type' => 'int',
            'comment' => '基本单位已领数量',
        ],
        [
            'name' => 'base_no_picked_qty',
            'attribute' => 'FBaseNoPickedQty',
            'field' => 'FBaseNoPickedQty',
            'type' => 'int',
            'comment' => '基本单位未领数量',
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
            'name' => 'is_reviewed',
            'attribute' => 'F_ORA_Checkbox',
            'field' => 'F_ORA_Checkbox',
            'type' => 'bool',
            'comment' => '是否复核',
        ],
        [
            'name' => 'review_time',
            'attribute' => 'F_ORA_Datetime',
            'field' => 'F_ORA_Datetime',
            'type' => 'string',
            'comment' => '复核时间',
        ],
        [
            'name' => 'reviewer',
            'attribute' => 'F_ALZ_Text',
            'field' => 'F_ALZ_Text',
            'type' => 'string',
            'comment' => '复核人',
        ],
    ];
}
