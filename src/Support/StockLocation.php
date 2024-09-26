<?php

namespace PcbKingdee\Support;

class StockLocation
{
    /**
     * @var string
     */
    protected $prefix = 'stock_loc';

    /**
     * @var array
     */
    protected $flexIds = [
        'f100001',
        'f100002',
    ];

    /**
     * @var array
     */
    protected $attributes = [
        // 'stock_loc_f100001_number' => '',
        // 'stock_loc_f100002_number' => '',
        // ...
    ];

    /**
     * @param string $flexId
     * @return string
     */
    protected function buildNumberKey($flexId)
    {
        return "{$this->prefix}_{$flexId}_number";
    }

    /**
     * @param string $flexId
     * @return string
     */
    protected function buildNameKey($flexId)
    {
        return "{$this->prefix}_{$flexId}_name";
    }

    /**
     * @param array|object $entity
     * @return static
     */
    public static function fromEntity($entity)
    {
        $instance = new static();

        foreach ($instance->flexIds as $flexId) {
            $numberKey = $instance->buildNumberKey($flexId);

            $nameKey = $instance->buildNameKey($flexId);

            $instance->attributes[$numberKey] = is_array($entity) ? ($entity[$numberKey] ?? null) : ($entity->$numberKey ?? null);

            $instance->attributes[$nameKey] = is_array($entity) ? ($entity[$nameKey] ?? null) : ($entity->$nameKey ?? null);
        }

        return $instance;
    }

    /**
     * @return string
     */
    public function toNumber()
    {
        $segments = [];

        foreach ($this->flexIds as $flexId) {
            $numberKey = $this->buildNumberKey($flexId);

            $segments[] = $this->attributes[$numberKey] ?? '';
        }

        return implode('.', array_filter($segments));
    }

    /**
     * @return string
     */
    public function toName()
    {
        $segments = [];

        foreach ($this->flexIds as $flexId) {
            $nameKey = $this->buildNameKey($flexId);

            $segments[] = $this->attributes[$nameKey] ?? '';
        }

        return implode('.', array_filter($segments));
    }

    /**
     * @param string $number
     * @return static
     */
    public static function fromNumber($number)
    {
        $instance = new static();

        $segments = explode('.', $number);

        foreach ($instance->flexIds as $index => $flexId) {
            $numberKey = $instance->buildNumberKey($flexId);

            $instance->attributes[$numberKey] = $segments[$index] ?? null;
        }

        return $instance;
    }

    /**
     * @param string $name
     * @return static
     */
    public static function fromName($name)
    {
        $instance = new static();

        $segments = explode('.', $name);

        foreach ($instance->flexIds as $index => $flexId) {
            $nameKey = $instance->buildNameKey($flexId);

            $instance->attributes[$nameKey] = $segments[$index] ?? null;
        }

        return $instance;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return $this->attributes;
    }
}
