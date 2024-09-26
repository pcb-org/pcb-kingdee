<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\InventoryMapping;

class Inventory extends BaseModel
{
    /**
     * @var string
     */
    protected static $formId = 'STK_Inventory';

    /**
     * @return string
     */
    public function getFormId()
    {
        return static::$formId;
    }

    /**
     * @return array
     */
    public function getMapping()
    {
        return InventoryMapping::$mapping;
    }

    /**
     * @return \PcbKernel\Support\Collection<object>
     */
    public function findAllBills()
    {
        return $this->findAll($this->getMapping());
    }

    /**
     * @return object|null
     */
    public function findBill()
    {
        return $this->findOne($this->getMapping());
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return \PcbKernel\Pagination\TotalAwarePaginator
     */
    public function paginateBills($page = 1, $perPage = 20)
    {
        return $this->paginate($this->getMapping(), $page, $perPage);
    }
}
