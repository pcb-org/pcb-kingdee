<?php

namespace PcbKingdee\Concerns;

use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use PcbKernel\Support\Collection;
use PcbKingdee\Support\StockLocation;

trait QueryFilterTrait
{
    /**
     * @var array
     */
    protected $conditions = [];

    /**
     * 添加「等于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return $this
     */
    public function addFilterEqual($field, $value, $logical = 'AND')
    {
        if (!is_array($value)) {
            $this->conditions[] = [
                'field' => $field,
                'compare' => 'Equal',
                'value' => $value,
                'logical' => $logical,
            ];
        }

        return $this;
    }

    /**
     * 添加「不等于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return $this
     */
    public function addFilterNotEqual($field, $value, $logical = 'AND')
    {
        if (!is_array($value)) {
            $this->conditions[] = [
                'field' => $field,
                'compare' => 'NotEqual',
                'value' => $value,
                'logical' => $logical,
            ];
        }

        return $this;
    }

    /**
     * 添加「大于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return $this
     */
    public function addFilterGreater($field, $value, $logical = 'AND')
    {
        if (!is_array($value)) {
            $this->conditions[] = [
                'field' => $field,
                'compare' => 'Greater',
                'value' => $value,
                'logical' => $logical,
            ];
        }

        return $this;
    }

    /**
     * 添加「大于等于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return $this
     */
    public function addFilterGreaterOrEqual($field, $value, $logical = 'AND')
    {
        if (!is_array($value)) {
            $this->conditions[] = [
                'field' => $field,
                'compare' => 'GreaterOrEqual',
                'value' => $value,
                'logical' => $logical,
            ];
        }

        return $this;
    }

    /**
     * 添加「小于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return $this
     */
    public function addFilterLess($field, $value, $logical = 'AND')
    {
        if (!is_array($value)) {
            $this->conditions[] = [
                'field' => $field,
                'compare' => 'Less',
                'value' => $value,
                'logical' => $logical,
            ];
        }

        return $this;
    }

    /**
     * 添加「小于等于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return $this
     */
    public function addFilterLessOrEqual($field, $value, $logical = 'AND')
    {
        if (!is_array($value)) {
            $this->conditions[] = [
                'field' => $field,
                'compare' => 'LessOrEqual',
                'value' => $value,
                'logical' => $logical,
            ];
        }

        return $this;
    }

    /**
     * 添加「类似于」
     *
     * @param string $field
     * @param string $value
     * @param string $type
     * @param string $logical
     * @return $this
     */
    public function addFilterLike($field, $value, $type = 'both', $logical = 'AND')
    {
        if (is_string($value)) {
            switch (strtolower($type)) {
                case 'both':
                    $this->conditions[] = [
                        'field' => $field,
                        'compare' => 'Like',
                        'value' => $value,
                        'logical' => $logical,
                    ];
                    break;
                case 'left':
                    $this->conditions[] = [
                        'field' => $field,
                        'compare' => 'LeftLike',
                        'value' => $value,
                        'logical' => $logical,
                    ];
                    break;
                case 'right':
                    $this->conditions[] = [
                        'field' => $field,
                        'compare' => 'RightLike',
                        'value' => $value,
                        'logical' => $logical,
                    ];
                    break;
            }
        }

        return $this;
    }

    /**
     * 添加「In」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return $this
     */
    public function addFilterIn($field, $value, $logical = 'AND')
    {
        if (is_array($value)) {
            $this->conditions[] = [
                'field' => $field,
                'compare' => 'In',
                'value' => $value,
                'logical' => $logical,
            ];
        }

        return $this;
    }

    /**
     * 添加「NotIn」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return $this
     */
    public function addFilterNotIn($field, $value, $logical = 'AND')
    {
        if (is_array($value)) {
            $this->conditions[] = [
                'field' => $field,
                'compare' => 'NotIn',
                'value' => $value,
                'logical' => $logical,
            ];
        }

        return $this;
    }

    /**
     * 添加「真」
     *
     * @param string $field
     * @param string $logical
     * @return $this
     */
    public function addFilterTrue($field, $logical = 'AND')
    {
        $this->conditions[] = [
            'field' => $field,
            'compare' => 'True',
            'value' => null,
            'logical' => $logical,
        ];

        return $this;
    }

    /**
     * 添加「假」
     *
     * @param string $field
     * @param string $logical
     * @return $this
     */
    public function addFilterFalse($field, $logical = 'AND')
    {
        $this->conditions[] = [
            'field' => $field,
            'compare' => 'False',
            'value' => null,
            'logical' => $logical,
        ];

        return $this;
    }

    /**
     * 添加「为空」
     *
     * @param string $field
     * @param string $logical
     * @return $this
     */
    public function addFilterIsNull($field, $logical = 'AND')
    {
        $this->conditions[] = [
            'field' => $field,
            'compare' => 'IsNull',
            'value' => null,
            'logical' => $logical,
        ];

        return $this;
    }

    /**
     * 添加「不为空」
     *
     * @param string $field
     * @param string $logical
     * @return $this
     */
    public function addFilterIsNotNull($field, $logical = 'AND')
    {
        $this->conditions[] = [
            'field' => $field,
            'compare' => 'IsNotNull',
            'value' => null,
            'logical' => $logical,
        ];

        return $this;
    }

    /**
     * 添加「日期」
     *
     * @param string $field
     * @param string $value
     * @param string $logical
     * @return $this
     */
    public function addFilterDate($field, $value, $logical = 'AND')
    {
        if (is_string($value)) {
            $this->conditions[] = [
                'field' => $field,
                'compare' => 'Date',
                'value' => $value,
                'logical' => $logical,
            ];
        }

        return $this;
    }

    /**
     * 添加「仓位编码」
     *
     * @param string $value
     * @param string $logical
     * @return $this
     */
    public function addFilterStockLocNumber($value, $logical = 'AND')
    {
        $numbers = StockLocation::fromNumber($value)->toArray();

        foreach ($numbers as $field => $number) {
            if (!is_array($number)) {
                $this->addFilterEqual($field, $number, $logical);
            }
        }

        return $this;
    }

    /**
     * 添加「仓位名称」
     *
     * @param string $value
     * @param string $logical
     * @return $this
     */
    public function addFilterStockLocName($value, $logical = 'AND')
    {
        $names = StockLocation::fromName($value)->toArray();

        foreach ($names as $field => $name) {
            if (!is_array($name)) {
                $this->addFilterEqual($field, $name, $logical);
            }
        }

        return $this;
    }

    /**
     * @param array $mapping
     * @return string
     */
    public function buildQueryFilter($mapping)
    {
        $columns = array_reduce($mapping, function ($carry, $item) {
            $carry[$item['name']] = $item['attribute'];
            return $carry;
        }, []);

        $criterias = Collection::make($this->conditions)->map(function ($filter) use ($columns) {
            return isset($columns[$filter['field']])
                ? $this->buildCondition(
                    $columns[$filter['field']],
                    $filter['compare'],
                    $filter['value'],
                    $filter['logical']
                )
                : null;
        })->filter()->all();

        return trim(implode(' ', $criterias), 'OrorANDand');
    }

    /**
     * 构建查询条件
     *
     * @param string $field
     * @param string $compare
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function buildCondition($field, $compare, $value, $logical)
    {
        switch ($compare) {
            case 'Equal':
                return $this->handleFilterEqual($field, $value, $logical);
            case 'NotEqual':
                return $this->handleFilterNotEqual($field, $value, $logical);
            case 'Greater':
                return $this->handleFilterGreater($field, $value, $logical);
            case 'GreaterOrEqual':
                return $this->handleFilterGreaterOrEqual($field, $value, $logical);
            case 'Less':
                return $this->handleFilterLess($field, $value, $logical);
            case 'LessOrEqual':
                return $this->handleFilterLessOrEqual($field, $value, $logical);
            case 'Like':
                return $this->handleFilterLike($field, $value, $logical);
            case 'LeftLike':
                return $this->handleFilterLeftLike($field, $value, $logical);
            case 'RightLike':
                return $this->handleFilterRightLike($field, $value, $logical);
            case 'In':
                return $this->handleFilterIn($field, $value, $logical);
            case 'NotIn':
                return $this->handleFilterNotIn($field, $value, $logical);
            case 'True':
                return $this->handleFilterTrue($field, $logical);
            case 'False':
                return $this->handleFilterFalse($field, $logical);
            case 'IsNull':
                return $this->handleFilterIsNull($field, $logical);
            case 'IsNotNull':
                return $this->handleFilterIsNotNull($field, $logical);
            case 'Date':
                return $this->handleFilterDate($field, $value, $logical);
            default:
                return '';
        }
    }

    /**
     * 处理「等于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterEqual($field, $value, $logical = 'AND')
    {
        $value = $this->handleQuotation($value);

        return "{$field} = {$value} {$logical}";
    }

    /**
     * 处理「不等于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterNotEqual($field, $value, $logical = 'AND')
    {
        $value = $this->handleQuotation($value);

        return "{$field} <> {$value} {$logical}";
    }

    /**
     * 处理「大于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterGreater($field, $value, $logical = 'AND')
    {
        $value = $this->handleQuotation($value);

        return "{$field} > {$value} {$logical}";
    }

    /**
     * 处理「大于等于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterGreaterOrEqual($field, $value, $logical = 'AND')
    {
        $value = $this->handleQuotation($value);

        return "{$field} >= {$value} {$logical}";
    }

    /**
     * 处理「小于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterLess($field, $value, $logical = 'AND')
    {
        $value = $this->handleQuotation($value);

        return "{$field} < {$value} {$logical}";
    }

    /**
     * 处理「小于等于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterLessOrEqual($field, $value, $logical = 'AND')
    {
        $value = $this->handleQuotation($value);

        return "{$field} <= {$value} {$logical}";
    }

    /**
     * 处理「类似于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterLike($field, $value, $logical = 'AND')
    {
        $value = $this->handleEscape($value);

        return "{$field} LIKE '%{$value}%' {$logical}";
    }

    /**
     * 处理「Left类似于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterLeftLike($field, $value, $logical = 'AND')
    {
        $value = $this->handleEscape($value);

        return "{$field} LIKE '%{$value}' {$logical}";
    }

    /**
     * 处理「Right类似于」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterRightLike($field, $value, $logical = 'AND')
    {
        $value = $this->handleEscape($value);

        return "{$field} LIKE '{$value}%' {$logical}";
    }

    /**
     * 处理「In」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterIn($field, $value, $logical = 'AND')
    {
        $value = $this->handleInValue($value);

        return !empty($value) ? "{$field} IN ( {$value} ) {$logical}" : '';
    }

    /**
     * 处理「NotIn」
     *
     * @param string $field
     * @param mixed $value
     * @param string $logical
     * @return string
     */
    private function handleFilterNotIn($field, $value, $logical = 'AND')
    {
        $value = $this->handleInValue($value);

        return !empty($value) ? "{$field} NOT IN ( {$value} ) {$logical}" : '';
    }

    /**
     * 处理In值
     *
     * @param array $value
     * @return string
     */
    private function handleInValue($value)
    {
        $values = Collection::wrap($value)->map(function ($item) {
            return !is_array($item) ? $this->handleQuotation($item) : null;
        })->filter()->all();

        return trim(implode(',', $values), ',');
    }

    /**
     * 处理「真」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterTrue($field, $logical = 'AND')
    {
        return "{$field} = 1 {$logical}";
    }

    /**
     * 处理「假」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterFalse($field, $logical = 'AND')
    {
        return "{$field} = 0 {$logical}";
    }

    /**
     * 处理「为空」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterIsNull($field, $logical = 'AND')
    {
        return "{$field} IS NULL {$logical}";
    }

    /**
     * 处理「不为空」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterIsNotNull($field, $logical = 'AND')
    {
        return "{$field} IS NOT NULL {$logical}";
    }

    /**
     * 处理「日期」
     *
     * @param string $field
     * @param string $value
     * @param string $logical
     * @return string
     */
    private function handleFilterDate($field, $value, $logical = 'AND')
    {
        switch (strtolower($value)) {
            case 'yesterday':
                return $this->handleFilterDateYesterday($field, $logical);
                break;
            case 'today':
                return $this->handleFilterDateToday($field, $logical);
                break;
            case 'lastweek':
                return $this->handleFilterDateLastWeek($field, $logical);
                break;
            case 'thisweek':
                return $this->handleFilterDateThisWeek($field, $logical);
                break;
            case 'lastmonth':
                return $this->handleFilterDateLastMonth($field, $logical);
                break;
            case 'thismonth':
                return $this->handleFilterDateThisMonth($field, $logical);
                break;
            case 'recent60days':
                return $this->handleFilterDateRecentDays($field, 60, $logical);
                break;
            case 'recent90days':
                return $this->handleFilterDateRecentDays($field, 90, $logical);
                break;
            case 'recent180days':
                return $this->handleFilterDateRecentDays($field, 180, $logical);
                break;
            default:
                return $this->handleFilterDateEqual($field, $value, $logical);
                break;
        }
    }

    /**
     * 处理「日期昨天」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterDateYesterday($field, $logical = 'AND')
    {
        $start = Carbon::yesterday()->startOfDay();

        $end = Carbon::yesterday()->endOfDay();

        return "{$field} BETWEEN '{$start}' AND '{$end}' {$logical}";
    }

    /**
     * 处理「日期今天」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterDateToday($field, $logical = 'AND')
    {
        $start = Carbon::today()->startOfDay();

        $end = Carbon::today()->endOfDay();

        return "{$field} BETWEEN '{$start}' AND '{$end}' {$logical}";
    }

    /**
     * 处理「日期上周」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterDateLastWeek($field, $logical = 'AND')
    {
        $start = Carbon::now()->startOfWeek()->subWeek();

        $end = Carbon::now()->endOfWeek()->subWeek();

        return "{$field} BETWEEN '{$start}' AND '{$end}' {$logical}";
    }

    /**
     * 处理「日期本周」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterDateThisWeek($field, $logical = 'AND')
    {
        $start = Carbon::now()->startOfWeek();

        $end = Carbon::now()->endOfWeek();

        return "{$field} BETWEEN '{$start}' AND '{$end}' {$logical}";
    }

    /**
     * 处理「日期上月」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterDateLastMonth($field, $logical = 'AND')
    {
        $start = Carbon::now()->startOfMonth()->subMonth();

        $end = Carbon::now()->endOfMonth()->subMonth();

        return "{$field} BETWEEN '{$start}' AND '{$end}' {$logical}";
    }

    /**
     * 处理「日期本月」
     *
     * @param string $field
     * @param string $logical
     * @return string
     */
    private function handleFilterDateThisMonth($field, $logical = 'AND')
    {
        $start = Carbon::now()->startOfMonth();

        $end = Carbon::now()->endOfMonth();

        return "{$field} BETWEEN '{$start}' AND '{$end}' {$logical}";
    }

    /**
     * 处理「日期最近（天）」
     *
     * @param string $field
     * @param int $value
     * @param string $logical
     * @return string
     */
    private function handleFilterDateRecentDays($field, $value, $logical = 'AND')
    {
        $start = Carbon::now()->subDays(max($value, 1) - 1)->startOfDay();

        $end = Carbon::now()->endOfDay();

        return "{$field} BETWEEN '{$start}' AND '{$end}' {$logical}";
    }

    /**
     * 处理「日期等于」
     *
     * @param string $field
     * @param string $value
     * @param string $logical
     * @return string
     */
    private function handleFilterDateEqual($field, $value, $logical = 'AND')
    {
        try {
            $date = Carbon::parse($value);

            $start = $date->copy()->startOfDay();

            $end = $date->copy()->endOfDay();

            return "{$field} BETWEEN '{$start}' AND '{$end}' {$logical}";
        } catch (InvalidFormatException $e) {
            return '';
        }
    }

    /**
     * 处理引号
     *
     * @param mixed $value
     * @return mixed
     */
    private function handleQuotation($value)
    {
        $value = $this->handleEscape($value);

        return is_string($value) ? "'" . $value . "'" : $value;
    }

    /**
     * 处理转义
     *
     * @param mixed $value
     * @return mixed
     */
    private function handleEscape($value)
    {
        return is_string($value) ? addslashes($value) : $value;
    }
}
