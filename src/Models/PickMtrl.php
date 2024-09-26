<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\PickMtrl\MasterMapping;
use PcbKingdee\Mappings\PickMtrl\EntryMapping;

class PickMtrl extends BillModel
{
    /**
     * @var string
     */
    protected static $formId = 'PRD_PickMtrl';

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
