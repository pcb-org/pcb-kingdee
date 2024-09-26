<?php

namespace PcbKingdee\Entities;

use PcbKernel\Contracts\Arrayable;

class SuccessEntity implements Arrayable
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $number;

    /**
     * @param int $id
     * @param string $number
     */
    public function __construct($id, $number)
    {
        $this->id = (int) $id;

        $this->number = (string) $number;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'number' => $this->number,
        ];
    }
}
