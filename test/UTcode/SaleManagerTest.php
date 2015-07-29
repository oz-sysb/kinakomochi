<?php
namespace VendingMachineUnitTest;

use VendingMachine\existence\DrinkInterface;
use VendingMachine\SaleManager;
use VendingMachine\existence\Coke;
use VendingMachine\existence\RedBull;
use VendingMachine\existence\Water;

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
            [99,  []],
            [100, ['水']],
            [101, ['水']],
            [119, ['水']],
            [120, ['コーラ', '水']],
            [121, ['コーラ', '水']],
            [199, ['コーラ', '水']],
            [200, ['コーラ', 'レッドブル', '水']],
            [201, ['コーラ', 'レッドブル', '水']],
        ];
    }

    /**
     * Unit Test: buyableJuice
     * 繰り返し購入後の在庫確認
     *
     * @param integer $buyCount  購入回数
     * @param integer $amount    投入金額
     * @param string  $juiceName ジュース名
     * @param array   $expected  期待結果
     *
     * @return void
     *
     * @test
     * @dataProvider providerForBuyableJuiceRepeat
     */
    public function confirmBuyableJuiceRepeat($buyCount, $amount, $juiceName, $expected)
    {
        for ($i = 0; $i < $buyCount; $i++) {
            $this->saleManager->buy($juiceName);
        }
        $this->assertEquals($expected, $this->saleManager->buyableJuice($amount));
    }

    /**
     * @return array
     */
    public function providerForBuyableJuiceRepeat()
    {
        return [
            [4, 500, 'コーラ',     ['コーラ', 'レッドブル', '水']],
            [5, 500, 'コーラ',     ['レッドブル', '水']],
            [6, 500, 'コーラ',     ['レッドブル', '水']],
            [4, 500, 'レッドブル', ['コーラ', 'レッドブル', '水']],
            [5, 500, 'レッドブル', ['コーラ', '水']],
            [6, 500, 'レッドブル', ['コーラ', '水']],
            [4, 500, '水',          ['コーラ', 'レッドブル', '水']],
            [5, 500, '水',          ['コーラ', 'レッドブル']],
            [6, 500, '水',          ['コーラ', 'レッドブル']],
        ];
    }


    /**
     * Unit Test: buy
     *
     * @param string $juiceName        ジュース名
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
        if ($initialStock > 0) {
            $this->assertEquals($initialStock - 1, $this->saleManager->getStockNumber($juiceName));
        } else {
            $this->assertEquals($initialStock, $this->saleManager->getStockNumber($juiceName));
        }
    }

    /**
     * @return array
     */
    public function providerForBuy()
    {
        return [
            ['コーラ'],
            ['レッドブル'],
            ['水'],
            ['ウォッカ'],
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
            ['レッドブル', new RedBull()],
            ['水', new Water()],
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
            ['レッドブル', 5],
            ['水', 5],
            ['ウォッカ', 0],
        ];
    }
}
