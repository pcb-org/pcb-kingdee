<?php

namespace PcbKingdee\Mappings\TransferDirect;

class EntryMapping
{
    /**
     * @var array
     */
    public static $mapping = [
        [
            'name' => 'entry_id',
            'attribute' => 'FBillEntry_FEntryId',
            'field' => 'FEntryId',
            'type' => 'int',
            'comment' => '分录内码',
        ],
        [
            'name' => 'seq',
            'attribute' => 'FBillEntry_FSeq',
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
            'comment' => '调拨数量',
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
            'name' => 'src_stock_id',
            'attribute' => 'FSrcStockId',
            'field' => 'FSrcStockId',
            'type' => 'int',
            'comment' => '源仓库',
        ],
        [
            'name' => 'src_stock_number',
            'attribute' => 'FSrcStockId.FNumber',
            'field' => 'FSrcStockId.FNumber',
            'type' => 'string',
            'comment' => '源仓库',
        ],
        [
            'name' => 'src_stock_name',
            'attribute' => 'FSrcStockId.FName',
            'field' => 'FSrcStockId.FName',
            'type' => 'string',
            'comment' => '源仓库',
        ],
        [
            'name' => 'src_stock_loc_id',
            'attribute' => 'FSrcStockLocId',
            'field' => 'FSrcStockLocId',
            'type' => 'int',
            'comment' => '源仓位',
        ],
        [
            'name' => 'src_stock_loc_f100001',
            'attribute' => 'FSrcStockLocId.FF100001',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100001',
            'type' => 'int',
            'comment' => '源仓位',
        ],
        [
            'name' => 'src_stock_loc_f100001_number',
            'attribute' => 'FSrcStockLocId.FF100001.FNumber',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100001.FNumber',
            'type' => 'string',
            'comment' => '源仓位',
        ],
        [
            'name' => 'src_stock_loc_f100001_name',
            'attribute' => 'FSrcStockLocId.FF100001.FName',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100001.FName',
            'type' => 'string',
            'comment' => '源仓位',
        ],
        [
            'name' => 'src_stock_loc_f100002',
            'attribute' => 'FSrcStockLocId.FF100002',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100002',
            'type' => 'int',
            'comment' => '源仓位',
        ],
        [
            'name' => 'src_stock_loc_f100002_number',
            'attribute' => 'FSrcStockLocId.FF100002.FNumber',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100002.FNumber',
            'type' => 'string',
            'comment' => '源仓位',
        ],
        [
            'name' => 'src_stock_loc_f100002_name',
            'attribute' => 'FSrcStockLocId.FF100002.FName',
            'field' => 'FSrcStockLocId.FSrcStockLocId__FF100002.FName',
            'type' => 'string',
            'comment' => '源仓位',
        ],
        [
            'name' => 'dest_stock_id',
            'attribute' => 'FDestStockId',
            'field' => 'FDestStockId',
            'type' => 'int',
            'comment' => '目标仓库',
        ],
        [
            'name' => 'dest_stock_number',
            'attribute' => 'FDestStockId.FNumber',
            'field' => 'FDestStockId.FNumber',
            'type' => 'string',
            'comment' => '目标仓库',
        ],
        [
            'name' => 'dest_stock_name',
            'attribute' => 'FDestStockId.FName',
            'field' => 'FDestStockId.FName',
            'type' => 'string',
            'comment' => '目标仓库',
        ],
        [
            'name' => 'dest_stock_loc_id',
            'attribute' => 'FDestStockLocId',
            'field' => 'FDestStockLocId',
            'type' => 'int',
            'comment' => '目标仓位',
        ],
        [
            'name' => 'dest_stock_loc_f100001',
            'attribute' => 'FDestStockLocId.FF100001',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100001',
            'type' => 'int',
            'comment' => '目标仓位',
        ],
        [
            'name' => 'dest_stock_loc_f100001_number',
            'attribute' => 'FDestStockLocId.FF100001.FNumber',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100001.FNumber',
            'type' => 'string',
            'comment' => '目标仓位',
        ],
        [
            'name' => 'dest_stock_loc_f100001_name',
            'attribute' => 'FDestStockLocId.FF100001.FName',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100001.FName',
            'type' => 'string',
            'comment' => '目标仓位',
        ],
        [
            'name' => 'dest_stock_loc_f100002',
            'attribute' => 'FDestStockLocId.FF100002',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100002',
            'type' => 'int',
            'comment' => '目标仓位',
        ],
        [
            'name' => 'dest_stock_loc_f100002_number',
            'attribute' => 'FDestStockLocId.FF100002.FNumber',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100002.FNumber',
            'type' => 'string',
            'comment' => '目标仓位',
        ],
        [
            'name' => 'dest_stock_loc_f100002_name',
            'attribute' => 'FDestStockLocId.FF100002.FName',
            'field' => 'FDestStockLocId.FDestStockLocId__FF100002.FName',
            'type' => 'string',
            'comment' => '目标仓位',
        ],
        [
            'name' => 'owner_type_out_id',
            'attribute' => 'FOwnerTypeOutId',
            'field' => 'FOwnerTypeOutId',
            'type' => 'string',
            'comment' => '调出货主类型',
        ],
        [
            'name' => 'owner_out_id',
            'attribute' => 'FOwnerOutId',
            'field' => 'FOwnerOutId',
            'type' => 'int',
            'comment' => '调出货主',
        ],
        [
            'name' => 'owner_out_number',
            'attribute' => 'FOwnerOutId.FNumber',
            'field' => 'FOwnerOutId.FNumber',
            'type' => 'string',
            'comment' => '调出货主',
        ],
        [
            'name' => 'owner_out_name',
            'attribute' => 'FOwnerOutId.FName',
            'field' => 'FOwnerOutId.FName',
            'type' => 'string',
            'comment' => '调出货主',
        ],
        [
            'name' => 'owner_type_id',
            'attribute' => 'FOwnerTypeId',
            'field' => 'FOwnerTypeId',
            'type' => 'string',
            'comment' => '调入货主类型',
        ],
        [
            'name' => 'owner_id',
            'attribute' => 'FOwnerId',
            'field' => 'FOwnerId',
            'type' => 'int',
            'comment' => '调入货主',
        ],
        [
            'name' => 'owner_number',
            'attribute' => 'FOwnerId.FNumber',
            'field' => 'FOwnerId.FNumber',
            'type' => 'string',
            'comment' => '调入货主',
        ],
        [
            'name' => 'owner_name',
            'attribute' => 'FOwnerId.FName',
            'field' => 'FOwnerId.FName',
            'type' => 'string',
            'comment' => '调入货主',
        ],
        [
            'name' => 'keeper_type_id',
            'attribute' => 'FKeeperTypeId',
            'field' => 'FKeeperTypeId',
            'type' => 'string',
            'comment' => '调入保管者类型',
        ],
        [
            'name' => 'keeper_id',
            'attribute' => 'FKeeperId',
            'field' => 'FKeeperId',
            'type' => 'int',
            'comment' => '调入保管者',
        ],
        [
            'name' => 'keeper_number',
            'attribute' => 'FKeeperId.FNumber',
            'field' => 'FKeeperId.FNumber',
            'type' => 'string',
            'comment' => '调入保管者',
        ],
        [
            'name' => 'keeper_name',
            'attribute' => 'FKeeperId.FName',
            'field' => 'FKeeperId.FName',
            'type' => 'string',
            'comment' => '调入保管者',
        ],
        [
            'name' => 'keeper_type_out_id',
            'attribute' => 'FKeeperTypeOutId',
            'field' => 'FKeeperTypeOutId',
            'type' => 'string',
            'comment' => '调出保管者类型',
        ],
        [
            'name' => 'keeper_out_id',
            'attribute' => 'FKeeperOutId',
            'field' => 'FKeeperOutId',
            'type' => 'int',
            'comment' => '调出保管者',
        ],
        [
            'name' => 'keeper_out_number',
            'attribute' => 'FKeeperOutId.FNumber',
            'field' => 'FKeeperOutId.FNumber',
            'type' => 'string',
            'comment' => '调出保管者',
        ],
        [
            'name' => 'keeper_out_name',
            'attribute' => 'FKeeperOutId.FName',
            'field' => 'FKeeperOutId.FName',
            'type' => 'string',
            'comment' => '调出保管者',
        ],
    ];
}
