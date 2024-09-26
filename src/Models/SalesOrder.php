<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\SalesOrder\MasterMapping;
use PcbKingdee\Mappings\SalesOrder\EntryMapping;

class SalesOrder extends BillModel
{
    /**
     * @var string
     */
    protected static $formId = 'SAL_SaleOrder';

    /**
     * @return string
     */
    protected static $entityId = 'FSaleOrderEntry';

    /**
     * @return string
     */
    public function getFormId()
    {
        return static::$formId;
    }

    /**
     * @return string
     */
    protected function getEntityId()
    {
        return static::$entityId;
    }

    /**
     * @return array
     */
    protected function getMasterMapping()
    {
        return MasterMapping::$mapping;
    }

    /**
     * @return array
     */
    protected function getEntryMapping()
    {
        return EntryMapping::$mapping;
    }
}
