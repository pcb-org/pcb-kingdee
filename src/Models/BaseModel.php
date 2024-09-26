<?php

namespace PcbKingdee\Models;

use PcbKernel\Pagination\TotalAwarePaginator;
use PcbKernel\Support\Collection;
use PcbKingdee\Concerns\QueryFieldTrait;
use PcbKingdee\Concerns\QueryFilterTrait;
use PcbKingdee\Concerns\QueryResultTrait;
use PcbKingdee\Concerns\QuerySortOrderTrait;

abstract class BaseModel
{
    use QueryFieldTrait;
    use QueryFilterTrait;
    use QueryResultTrait;
    use QuerySortOrderTrait;

    /**
     * @var \PcbKingdee\Client
     */
    protected $client;

    /**
     * @param \PcbKingdee\Client $client
     * @return void
     */
    public function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    abstract public function getFormId();

    /**
     * @return array
     */
    abstract protected function getMapping();

    /**
     * @param array $mapping
     * @return \PcbKernel\Support\Collection<object>
     */
    protected function findAll($mapping)
    {
        $items = $this->client->query($this->getFormId(), [
            'form_id' => $this->getFormId(),
            'field_keys' => $this->buildQueryFields($mapping),
            'filter_string' => $this->buildQueryFilter($mapping),
            'order_string' => $this->buildSortOrder($mapping),
            'start_row' => 0,
            'limit' => 0,
        ]);

        return Collection::make($items)->map(function ($item) use ($mapping) {
            return (object) $this->associateValuesWithNames($mapping, $item);
        });
    }

    /**
     * @param array $mapping
     * @return object|null
     */
    protected function findOne($mapping)
    {
        $items = $this->client->query($this->getFormId(), [
            'form_id' => $this->getFormId(),
            'field_keys' => $this->buildQueryFields($mapping),
            'filter_string' => $this->buildQueryFilter($mapping),
            'order_string' => $this->buildSortOrder($mapping),
            'start_row' => 0,
            'limit' => 1,
        ]);

        if (count($items) < 1) {
            return null;
        }

        return (object) $this->associateValuesWithNames($mapping, $items[0]);
    }

    /**
     * @param array $mapping
     * @return int
     */
    protected function count($mapping)
    {
        $idDataType = Collection::make($mapping)->first(function ($item) {
            return $item['name'] === 'id';
        })['type'] ?? null;

        if ($idDataType == 'int' || $idDataType == 'integer') {
            $this->addFilterGreater('id', 0);
        }

        return $this->client->count($this->getFormId(), [
            'form_id' => $this->getFormId(),
            'filter_string' => $this->buildQueryFilter($mapping),
        ]);
    }

    /**
     * @param array $mapping
     * @param int $page
     * @param int $perPage
     * @return \PcbKernel\Pagination\TotalAwarePaginator
     */
    protected function paginate($mapping, $page = 1, $perPage = 20)
    {
        $page = (int) max($page, 1);

        $perPage = (int) max($perPage, 1);

        $items = $this->client->query($this->getFormId(), [
            'form_id' => $this->getFormId(),
            'field_keys' => $this->buildQueryFields($mapping),
            'filter_string' => $this->buildQueryFilter($mapping),
            'order_string' => $this->buildSortOrder($mapping),
            'start_row' => ($page - 1) * $perPage,
            'limit' => $perPage,
        ]);

        $items = Collection::make($items)->map(function ($item) use ($mapping) {
            return (object) $this->associateValuesWithNames($mapping, $item);
        });

        $total = count($items) > 0 ? $this->count($mapping) : 0;

        return new TotalAwarePaginator($items, $total, $perPage, $page);
    }
}
