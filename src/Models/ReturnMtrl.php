<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\ReturnMtrl\MasterMapping;
use PcbKingdee\Mappings\ReturnMtrl\EntryMapping;

class ReturnMtrl extends BillModel
{
    /**
     * @var string
     */
    protected static $formId = 'PRD_ReturnMtrl';

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
