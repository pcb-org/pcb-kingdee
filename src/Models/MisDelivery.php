<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\MisDelivery\MasterMapping;
use PcbKingdee\Mappings\MisDelivery\EntryMapping;

class MisDelivery extends BillModel
{
    /**
     * @var string
     */
    protected static $formId = 'STK_MisDelivery';

    /**
     * @return string
     */
    protected static $entityId = 'FEntity';

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
