<?php

namespace PcbKingdee\Entities;

use PcbKernel\Support\Collection;

class SuccessCollection extends Collection
{
    /**
     * @param array $items
     * @return static
     */
    public static function fromArray($items)
    {
        return new static(Collection::make($items)->map(function ($item) {
            return new SuccessEntity(
                $item['Id'] ?? null,
                $item['Number'] ?? null
            );
        }));
    }

    /**
     * @return bool
     */
    public function everyIdIsValid()
    {
        return $this->every(function (SuccessEntity $item) {
            return !empty($item->id);
        });
    }

    /**
     * @return bool
     */
    public function everyNumberIsValid()
    {
        return $this->every(function (SuccessEntity $item) {
            return !empty($item->number);
        });
    }

    /**
     * @return \PcbKernel\Support\Collection
     */
    public function pluckIds()
    {
        return $this->map(function ($item) {
            return $item->id;
        });
    }

    /**
     * @return \PcbKernel\Support\Collection
     */
    public function pluckNumbers()
    {
        return $this->map(function ($item) {
            return $item->number;
        });
    }
}
