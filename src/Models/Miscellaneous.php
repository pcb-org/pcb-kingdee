<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\Miscellaneous\EntryMapping;
use PcbKingdee\Mappings\Miscellaneous\MasterMapping;

class Miscellaneous extends BillModel
{
    /**
     * @var string
     */
    protected static $formId = 'STK_Miscellaneous';

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
