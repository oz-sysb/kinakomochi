<?php
namespace VendingMachineUnitTest;

use VendingMachine\JuiceBox;
use VendingMachine\existence\Coke;

class JuiceBoxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var JuiceBox
     */
    private $juiceBox;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->juiceBox = new JuiceBox();
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
        $this->assertEquals($initData, $this->juiceBox->getJuice("コーラ"));
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
        $initialStock = $this->juiceBox->getJuice("コーラ")->getStockNumber();
        $this->juiceBox->buy("コーラ");
        $this->assertEquals($initialStock - 1, $this->juiceBox->getJuice("コーラ")->getStockNumber());
    }
}
