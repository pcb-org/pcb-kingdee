<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\DeliveryNotice\EntryMapping;
use PcbKingdee\Mappings\DeliveryNotice\MasterMapping;

class DeliveryNotice extends BillModel
{
    /**
     * @var string
     */
    protected static $formId = 'SAL_DeliveryNotice';

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
