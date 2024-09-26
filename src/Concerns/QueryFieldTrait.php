<?php

namespace PcbKingdee\Concerns;

trait QueryFieldTrait
{
    /**
     * @return array
     */
    public function buildQueryFields($mapping)
    {
        return array_column($mapping, 'attribute');
    }
}
