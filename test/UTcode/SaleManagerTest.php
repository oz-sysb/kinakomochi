<?php
namespace VendingMachineUnitTest;

use VendingMachine\SaleManager;

class SaleManagerTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var SaleManager
     */
    private $saleManager;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->saleManager = new SaleManager();
    }

    /**
     * Unit Test: validateMoney
     *
     * @param integer $money    お金
     *
     * @return void
     *
     * @test
     * @dataProvider allAmountInjector
     */
    public function checkPurchaseTest($money)
    {
        $result = $this->saleManager->checkBought($money);
        $this->assertEquals('hoge', $result);
    }

    /**
     * @return array
     */
    public function allAmountInjector()
    {
        return [
            [100]
        ];
    }
}
