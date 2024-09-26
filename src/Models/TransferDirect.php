<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\TransferDirect\EntryMapping;
use PcbKingdee\Mappings\TransferDirect\MasterMapping;

class TransferDirect extends BillModel
{
    /**
     * @var string
     */
    protected static $formId = 'STK_TransferDirect';

    /**
     * @return string
     */
    protected static $entityId = 'FBillEntry';

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
