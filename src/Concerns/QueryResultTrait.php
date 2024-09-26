<?php

namespace PcbKingdee\Concerns;

use PcbKingdee\Exceptions\RuntimeException;

trait QueryResultTrait
{
    /**
     * @param array $mapping
     * @param array $values
     * @return array
     * @throws \PcbKingdee\Exceptions\RuntimeException
     */
    public function associateValuesWithNames($mapping, $values)
    {
        $names = array_column($mapping, 'name');

        if (count($names) !== count($values)) {
            throw new RuntimeException('组合名称 names 和 values 必须有相同的长度');
        }

        return array_combine($names, array_map(function ($value) {
            return is_string($value) ? trim($value) : $value;
        }, $values));
    }
}
