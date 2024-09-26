<?php

namespace PcbKingdee\Mappings\MisDelivery;

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
            'comment' => '实发数量',
        ],
        [
            'name' => 'stock_id',
            'attribute' => 'FStockId',
            'field' => 'FStockId',
            'type' => 'int',
            'comment' => '发货仓库',
        ],
        [
            'name' => 'stock_number',
            'attribute' => 'FStockId.FNumber',
            'field' => 'FStockId.FNumber',
            'type' => 'string',
            'comment' => '发货仓库',
        ],
        [
            'name' => 'stock_name',
            'attribute' => 'FStockId.FName',
            'field' => 'FStockId.FName',
            'type' => 'string',
            'comment' => '发货仓库',
        ],
        [
            'name' => 'stock_loc_id',
            'attribute' => 'FStockLocId',
            'field' => 'FStockLocId',
            'type' => 'int',
            'comment' => '发货仓位',
        ],
        [
            'name' => 'stock_loc_f100001',
            'attribute' => 'FStockLocId.FF100001',
            'field' => 'FStockLocId.FStockLocId__FF100001',
            'type' => 'int',
            'comment' => '发货仓位',
        ],
        [
            'name' => 'stock_loc_f100001_number',
            'attribute' => 'FStockLocId.FF100001.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100001.FNumber',
            'type' => 'string',
            'comment' => '发货仓位',
        ],
        [
            'name' => 'stock_loc_f100001_name',
            'attribute' => 'FStockLocId.FF100001.FName',
            'field' => 'FStockLocId.FStockLocId__FF100001.FName',
            'type' => 'string',
            'comment' => '发货仓位',
        ],
        [
            'name' => 'stock_loc_f100002',
            'attribute' => 'FStockLocId.FF100002',
            'field' => 'FStockLocId.FStockLocId__FF100002',
            'type' => 'int',
            'comment' => '发货仓位',
        ],
        [
            'name' => 'stock_loc_f100002_number',
            'attribute' => 'FStockLocId.FF100002.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100002.FNumber',
            'type' => 'string',
            'comment' => '发货仓位',
        ],
        [
            'name' => 'stock_loc_f100002_name',
            'attribute' => 'FStockLocId.FF100002.FName',
            'field' => 'FStockLocId.FStockLocId__FF100002.FName',
            'type' => 'string',
            'comment' => '发货仓位',
        ],
        [
            'name' => 'lot_id',
            'attribute' => 'FLot',
            'field' => 'FLot',
            'type' => 'int',
            'comment' => '批号',
        ],
        [
            'name' => 'lot_number',
            'attribute' => 'FLot.FNumber',
            'field' => 'FLot.FNumber',
            'type' => 'string',
            'comment' => '批号',
        ],
        [
            'name' => 'lot_name',
            'attribute' => 'FLot.FName',
            'field' => 'FLot.FName',
            'type' => 'string',
            'comment' => '批号',
        ],
        [
            'name' => 'src_bill_type',
            'attribute' => 'FSrcBillTypeId',
            'field' => 'FSrcBillTypeId',
            'type' => 'string',
            'comment' => '源单类型',
        ],
        [
            'name' => 'src_bill_number',
            'attribute' => 'FSrcBillNo',
            'field' => 'FSrcBillNo',
            'type' => 'string',
            'comment' => '源单单号',
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
            'name' => 'keeper_type_id',
            'attribute' => 'FKeeperTypeId',
            'field' => 'FKeeperTypeId',
            'type' => 'string',
            'comment' => '保管者类型',
        ],
        [
            'name' => 'keeper_id',
            'attribute' => 'FKeeperId',
            'field' => 'FKeeperId',
            'type' => 'int',
            'comment' => '保管者',
        ],
        [
            'name' => 'keeper_number',
            'attribute' => 'FKeeperId.FNumber',
            'field' => 'FKeeperId.FNumber',
            'type' => 'string',
            'comment' => '保管者',
        ],
        [
            'name' => 'keeper_name',
            'attribute' => 'FKeeperId.FName',
            'field' => 'FKeeperId.FName',
            'type' => 'string',
            'comment' => '保管者',
        ],
    ];
}
