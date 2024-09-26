<?php

namespace PcbKingdee\Mappings\ReturnMtrl;

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
            'name' => 'app_qty',
            'attribute' => 'FAppQty',
            'field' => 'FAppQty',
            'type' => 'int',
            'comment' => '申请数量',
        ],
        [
            'name' => 'qty',
            'attribute' => 'FQty',
            'field' => 'FQty',
            'type' => 'int',
            'comment' => '实退数量',
        ],
        [
            'name' => 'return_type',
            'attribute' => 'FReturnType',
            'field' => 'FReturnType',
            'type' => 'string',
            'comment' => '退料类型',
        ],
        [
            'name' => 'stock_id',
            'attribute' => 'FStockId',
            'field' => 'FStockId',
            'type' => 'int',
            'comment' => '仓库',
        ],
        [
            'name' => 'stock_number',
            'attribute' => 'FStockId.FNumber',
            'field' => 'FStockId.FNumber',
            'type' => 'string',
            'comment' => '仓库',
        ],
        [
            'name' => 'stock_name',
            'attribute' => 'FStockId.FName',
            'field' => 'FStockId.FName',
            'type' => 'string',
            'comment' => '仓库',
        ],
        [
            'name' => 'stock_loc_id',
            'attribute' => 'FStockLocId',
            'field' => 'FStockLocId',
            'type' => 'int',
            'comment' => '仓位',
        ],
        [
            'name' => 'stock_loc_f100001',
            'attribute' => 'FStockLocId.FF100001',
            'field' => 'FStockLocId.FStockLocId__FF100001',
            'type' => 'int',
            'comment' => '仓位',
        ],
        [
            'name' => 'stock_loc_f100001_number',
            'attribute' => 'FStockLocId.FF100001.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100001.FNumber',
            'type' => 'string',
            'comment' => '仓位',
        ],
        [
            'name' => 'stock_loc_f100001_name',
            'attribute' => 'FStockLocId.FF100001.FName',
            'field' => 'FStockLocId.FStockLocId__FF100001.FName',
            'type' => 'string',
            'comment' => '仓位',
        ],
        [
            'name' => 'stock_loc_f100002',
            'attribute' => 'FStockLocId.FF100002',
            'field' => 'FStockLocId.FStockLocId__FF100002',
            'type' => 'int',
            'comment' => '仓位',
        ],
        [
            'name' => 'stock_loc_f100002_number',
            'attribute' => 'FStockLocId.FF100002.FNumber',
            'field' => 'FStockLocId.FStockLocId__FF100002.FNumber',
            'type' => 'string',
            'comment' => '仓位',
        ],
        [
            'name' => 'stock_loc_f100002_name',
            'attribute' => 'FStockLocId.FF100002.FName',
            'field' => 'FStockLocId.FStockLocId__FF100002.FName',
            'type' => 'string',
            'comment' => '仓位',
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
            'attribute' => 'FSrcBillType',
            'field' => 'FSrcBillType',
            'type' => 'string',
            'comment' => '系统源单',
        ],
        [
            'name' => 'src_bill_id',
            'attribute' => 'FEntrySrcInterId',
            'field' => 'FEntrySrcInterId',
            'type' => 'int',
            'comment' => '系统源单',
        ],
        [
            'name' => 'src_bill_entry_id',
            'attribute' => 'FEntrySrcEnteryId',
            'field' => 'FEntrySrcEnteryId',
            'type' => 'int',
            'comment' => '系统源单',
        ],
        [
            'name' => 'src_bill_number',
            'attribute' => 'FSrcBillNo',
            'field' => 'FSrcBillNo',
            'type' => 'string',
            'comment' => '系统源单',
        ],
        [
            'name' => 'src_bill_seq',
            'attribute' => 'FEntrySrcEntrySeq',
            'field' => 'FEntrySrcEntrySeq',
            'type' => 'int',
            'comment' => '系统源单',
        ],
        [
            'name' => 'ppbom_number',
            'attribute' => 'FPPBomBillNo',
            'field' => 'FPPBomBillNo',
            'type' => 'string',
            'comment' => '用料清单',
        ],
        [
            'name' => 'ppbom_entry_id',
            'attribute' => 'FPPBomEntryId',
            'field' => 'FPPBomEntryId',
            'type' => 'int',
            'comment' => '用料清单',
        ],
        [
            'name' => 'req_bill_id',
            'attribute' => 'FReqBillId',
            'field' => 'FReqBillId',
            'type' => 'int',
            'comment' => '需求单据',
        ],
        [
            'name' => 'req_bill_entry_id',
            'attribute' => 'FReqEntryId',
            'field' => 'FReqEntryId',
            'type' => 'int',
            'comment' => '需求单据',
        ],
        [
            'name' => 'req_bill_number',
            'attribute' => 'FReqBillNo',
            'field' => 'FReqBillNo',
            'type' => 'string',
            'comment' => '需求单据',
        ],
        [
            'name' => 'req_bill_seq',
            'attribute' => 'FReqEntrySeq',
            'field' => 'FReqEntrySeq',
            'type' => 'int',
            'comment' => '需求单据',
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
            'name' => 'base_unit_id',
            'attribute' => 'FBaseUnitId',
            'field' => 'FBaseUnitId',
            'type' => 'int',
            'comment' => '单位',
        ],
        [
            'name' => 'base_unit_number',
            'attribute' => 'FBaseUnitId.FNumber',
            'field' => 'FBaseUnitId.FNumber',
            'type' => 'string',
            'comment' => '单位',
        ],
        [
            'name' => 'base_unit_name',
            'attribute' => 'FBaseUnitId.FName',
            'field' => 'FBaseUnitId.FName',
            'type' => 'string',
            'comment' => '单位',
        ],
        [
            'name' => 'base_app_qty',
            'attribute' => 'FBaseAppQty',
            'field' => 'FBaseAppQty',
            'type' => 'int',
            'comment' => '基本单位申请数量',
        ],
        [
            'name' => 'base_qty',
            'attribute' => 'FBaseQty',
            'field' => 'FBaseQty',
            'type' => 'int',
            'comment' => '基本单位实退数量',
        ],
    ];
}
