<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\MfgOrder\EntryMapping;
use PcbKingdee\Mappings\MfgOrder\MasterMapping;

class MfgOrder extends BillModel
{
    /**
     * @var string
     */
    protected static $formId = 'PRD_MO';

    /**
     * @return string
     */
    protected static $entityId = 'FTreeEntity';

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
