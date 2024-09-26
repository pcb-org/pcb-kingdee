<?php

namespace PcbKingdee\Models;

use PcbKingdee\Mappings\UserMapping;

class User extends BaseModel
{
    /**
     * @var string
     */
    protected static $formId = 'SEC_User';

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
        return UserMapping::$mapping;
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
