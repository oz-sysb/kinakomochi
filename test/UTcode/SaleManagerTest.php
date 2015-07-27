<?php
namespace VendingMachineUnitTest;

use VendingMachine\SaleManager;
use VendingMachine\existence\Coke;

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
     * 初期状態の確認
     *
     * @return void
     *
     * @test
     * @fixme 初期値をテストコードが知っているダメな例
     */
    public function confirmConstructor()
    {
        $initData = new Coke();
        $this->assertEquals($initData, $this->saleManager->getJuice("コーラ"));
    }

    /**
     * Unit Test: buy
     * 買えることを確認する
     *
     * @return void
     *
     * @test
     */
    public function confirmBuy()
    {
        $initialStock = $this->saleManager->getJuice("コーラ")->getStockNumber();
        $this->saleManager->buy("コーラ");
        $this->assertEquals($initialStock - 1, $this->saleManager->getJuice("コーラ")->getStockNumber());
    }
}
