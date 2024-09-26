<?php

namespace PcbKingdee\Tests;

use PcbKernel\Pagination\TotalAwarePaginator;

class MfgOrderModelTest extends TestCase
{
    public function testGetAccessToken()
    {
        $billNumber = '';

        $page = 1;

        $query = $this->app()->withUser($this->authUsername)->makeMfgOrder();

        $query->addFilterEqual('bill_number', $billNumber);

        $billItems = $query->paginateBillItems($page);

        $this->assertInstanceOf(TotalAwarePaginator::class, $billItems);
    }
}
