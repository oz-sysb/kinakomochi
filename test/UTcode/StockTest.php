<?php
namespace VendingMachineUnitTest;

use VendingMachine\Stock;

class StockTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Stock
     */
    private $stock;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->stock = new Stock();
    }

    /**
     * Unit Test: getAmount
     *
     * @return void
     *
     * @test
     */
    public function confirmGetAmount()
    {
        $this->assertEquals(0, $this->stock->getAmount('ウォッカ'));
    }
}
