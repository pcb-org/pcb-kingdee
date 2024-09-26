<?php

namespace PcbKingdee\Models;

use PcbKernel\Support\Arr;
use PcbKernel\Support\Collection;
use PcbKingdee\Entities\SuccessCollection;

abstract class BillModel extends BaseModel
{
    /**
     * @inheritDoc
     */
    public function buildSortOrder($mapping)
    {
        $columns = Collection::make($mapping)->mapWithKeys(function ($item) {
            return [$item['name'] => $item['attribute']];
        })->all();

        $sorts = [];

        if (isset($columns['id'])) {
            $sorts[] = "{$columns['id']} DESC";
        }

        if (isset($columns['seq'])) {
            $sorts[] = "{$columns['seq']} ASC";
        }

        return implode(',', $sorts);
    }

    /**
     * @return string
     */
    abstract protected function getEntityId();

    /**
     * @return array
     */
    abstract protected function getMasterMapping();

    /**
     * @return array
     */
    abstract protected function getEntryMapping();

    /**
     * @inheritDoc
     */
    protected function getMapping()
    {
        return array_merge(
            $this->getMasterMapping(),
            $this->getEntryMapping()
        );
    }

    /**
     * @return \PcbKernel\Support\Collection<object>
     */
    public function findAllBills()
    {
        return $this->findAll($this->getMasterMapping());
    }

    /**
     * @return \PcbKernel\Support\Collection<object>
     */
    public function findAllBillItems()
    {
        return $this->findAll($this->getMapping());
    }

    /**
     * @param int $id
     * @return object|null
     */
    public function findBillById($id)
    {
        $this->addFilterEqual('id', $id);

        $items = $this->findAll($this->getMapping());

        return $this->toBill($items);
    }

    /**
     * @param string $number
     * @return object|null
     */
    public function findBillByNumber($number)
    {
        $this->addFilterEqual('bill_number', $number);

        $items = $this->findAll($this->getMapping());

        return $this->toBill($items);
    }

    /**
     * @param \PcbKernel\Support\Collection<object> $items
     * @return object|null
     */
    protected function toBill($items)
    {
        if ($items->isEmpty()) {
            return null;
        }

        $masterNames = array_column($this->getMasterMapping(), 'name');

        $master = (object) array_intersect_key(get_object_vars($items->first()), array_flip($masterNames));

        $entryNames = array_column($this->getEntryMapping(), 'name');

        $master->entries = $items->map(function ($item) use ($entryNames) {
            return (object) array_intersect_key(get_object_vars($item), array_flip($entryNames));
        });

        return $master;
    }

    /**
     * @param int $id
     * @param int $entryId
     * @return object|null
     */
    public function findBillItemById($id, $entryId)
    {
        $this->addFilterEqual('id', $id)->addFilterEqual('entry_id', $entryId);

        return $this->findOne($this->getMapping());
    }

    /**
     * @param string $number
     * @param int $seq
     * @return object|null
     */
    public function findBillItemByNumber($number, $seq)
    {
        $this->addFilterEqual('bill_number', $number)->addFilterEqual('seq', $seq);

        return $this->findOne($this->getMapping());
    }

    /**
     * @return int
     */
    public function countBills()
    {
        return $this->count($this->getMasterMapping());
    }

    /**
     * @return int
     */
    public function countBillItems()
    {
        $this->addFilterGreater('entry_id', 0);

        return $this->count($this->getMapping());
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return \PcbKernel\Pagination\TotalAwarePaginator
     */
    public function paginateBills($page = 1, $perPage = 20)
    {
        return $this->paginate($this->getMasterMapping(), $page, $perPage);
    }

    /**
     * @param int $page
     * @param int $perPage
     * @return \PcbKernel\Pagination\TotalAwarePaginator
     */
    public function paginateBillItems($page = 1, $perPage = 20)
    {
        $this->addFilterGreater('entry_id', 0);

        return $this->paginate($this->getMapping(), $page, $perPage);
    }

    /**
     * @param array $data
     * @return \PcbKingdee\Entities\SuccessCollection
     */
    public function draft($data)
    {
        $successEntitys = $this->client->draft($this->getFormId(), [
            'model' => $this->buildBillFormData($data),
        ]);

        return SuccessCollection::fromArray($successEntitys);
    }

    /**
     * @param array $data
     * @return \PcbKingdee\Entities\SuccessCollection
     */
    public function save($data)
    {
        $successEntitys = $this->client->save($this->getFormId(), [
            'model' => $this->buildBillFormData($data),
        ]);

        return SuccessCollection::fromArray($successEntitys);
    }

    /**
     * @param array $data
     * @return array
     */
    protected function buildBillFormData($data)
    {
        $formData = $this->buildBillItemFormData($data, $this->getMasterMapping());

        $entries = Arr::get($data, 'entries');

        $formData[$this->getEntityId()] = array_map(function ($entry) {
            return $this->buildBillItemFormData($entry, $this->getEntryMapping());
        }, $entries);

        return $formData;
    }

    /**
     * @param array $data
     * @param array $mapping
     * @return array
     */
    protected function buildBillItemFormData($data, $mapping)
    {
        $formData = [];

        foreach ($mapping as $element) {
            if (isset($data[$element['name']])) {
                $formData[$element['field']] = Arr::get($data, $element['name']);
            }
        }

        return Arr::undot($formData);
    }

    /**
     * @param array $data
     * @return \PcbKingdee\Entities\SuccessCollection
     */
    public function submit($data)
    {
        $successEntitys = $this->client->submit($this->getFormId(), [
            'ids' => Arr::get($data, 'ids', []),
            'numbers' => Arr::get($data, 'numbers', []),
        ]);

        return SuccessCollection::fromArray($successEntitys);
    }

    /**
     * @param array $data
     * @return \PcbKingdee\Entities\SuccessCollection
     */
    public function audit($data)
    {
        $successEntitys = $this->client->audit($this->getFormId(), [
            'ids' => Arr::get($data, 'ids', []),
            'numbers' => Arr::get($data, 'numbers', []),
        ]);

        return SuccessCollection::fromArray($successEntitys);
    }

    /**
     * @param array $data
     * @return \PcbKingdee\Entities\SuccessCollection
     */
    public function unaudit($data)
    {
        $successEntitys = $this->client->unaudit($this->getFormId(), [
            'ids' => Arr::get($data, 'ids', []),
            'numbers' => Arr::get($data, 'numbers', []),
        ]);

        return SuccessCollection::fromArray($successEntitys);
    }

    /**
     * @param array $data
     * @return \PcbKingdee\Entities\SuccessCollection
     */
    public function delete($data)
    {
        $successEntitys = $this->client->delete($this->getFormId(), [
            'ids' => Arr::get($data, 'ids', []),
            'numbers' => Arr::get($data, 'numbers', []),
        ]);

        return SuccessCollection::fromArray($successEntitys);
    }

    /**
     * @param array $data
     * @return \PcbKingdee\Entities\SuccessCollection
     */
    public function push($data)
    {
        $successEntitys = $this->client->push($this->getFormId(), [
            'ids' => Arr::get($data, 'ids', []),
            'numbers' => Arr::get($data, 'numbers', []),
            'entry_ids' => Arr::get($data, 'entry_ids', []),
            'rule_id' => Arr::get($data, 'rule_id', ''),
            'target_bill_type_id' => Arr::get($data, 'target_bill_type_id', ''),
            'target_org_id' => Arr::get($data, 'target_org_id', 0),
            'target_form_id' => Arr::get($data, 'target_form_id', ''),
            'is_enable_default_rule' => Arr::get($data, 'is_enable_default_rule', false),
            'is_draft_when_save_fail' => Arr::get($data, 'is_draft_when_save_fail', true),
            'custom_params' => Arr::get($data, 'custom_params', []),
        ]);

        return SuccessCollection::fromArray($successEntitys);
    }
}
