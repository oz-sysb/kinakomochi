<?php
namespace VendingMachineUnitTest;

use VendingMachine\existence\DrinkInterface;
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
     * Unit Test: buyableJuice
     *
     * @param integer $amount   投入金額
     * @param array   $expected 期待結果
     *
     * @return void
     *
     * @test
     * @dataProvider providerForBuyableJuice
     */
    public function confirmBuyableJuice($amount, $expected)
    {
        $this->assertEquals($expected, $this->saleManager->buyableJuice($amount));
    }

    /**
     * @return array
     */
    public function providerForBuyableJuice()
    {
        return [
            [119, []],
            [120, ['コーラ']],
            [121, ['コーラ']],
        ];
    }

    /**
     * Unit Test: buy
     * 買えることを確認する
     *
     * @param string $juiceName ジュース名
     *
     * @return void
     *
     * @test
     * @dataProvider providerForBuy
     */
    public function confirmBuy($juiceName)
    {
        $initialStock = $this->saleManager->getStockNumber($juiceName);
        $this->saleManager->buy($juiceName);
        $this->assertEquals($initialStock - 1, $this->saleManager->getStockNumber($juiceName));
    }

    /**
     * @return array
     */
    public function providerForBuy()
    {
        return [
            ['コーラ'],
        ];
    }

    /**
     * Unit Test: getJuice
     *
     * @param string              $juiceName ジュース名
     * @param DrinkInterface|null $expected  期待結果
     *
     * @return void
     *
     * @test
     * @dataProvider providerForGetJuice
     */
    public function confirmGetJuice($juiceName, $expected)
    {
        $this->assertEquals($expected, $this->saleManager->getJuice($juiceName));
    }

    /**
     * @return array
     */
    public function providerForGetJuice()
    {
        return [
            ['コーラ', new Coke()],
            ['ウォッカ', null],
        ];
    }

    /**
     * Unit Test: getStockNumber
     *
     * @param string  $juiceName ジュース名
     * @param integer $expected  期待結果
     *
     * @return void
     *
     * @test
     * @dataProvider providerForGetStockNumber
     */
    public function confirmInitialStockNumber($juiceName, $expected)
    {
        $this->assertequals($expected, $this->saleManager->getStockNumber($juiceName));
    }

    /**
     * @return array
     */
    public function providerForGetStockNumber()
    {
        return [
            ['コーラ', 5],
            ['ウォッカ', 0],
        ];
    }
}
