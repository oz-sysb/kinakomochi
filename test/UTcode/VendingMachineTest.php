<?php
namespace VendingMachineUnitTest;

use VendingMachine\VendingMachine;
use VendingMachine\existence\Coke;

class VendingMachineTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var VendingMachine
     */
    private $vendingMachine;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->vendingMachine = new VendingMachine();
    }

    /**
     * Unit Test: takeMoney (投入1回)
     *
     * @param $inserted int 投入されるもの
     * @param $expected int 期待結果
     *
     * @return void
     *
     * @test
     * @dataProvider insertProvider
     */
    public function confirmTakeMoney($inserted, $expected)
    {
        $this->assertequals($expected, $this->vendingMachine->takeMoney($inserted));
    }

    /**
     * @return array
     */
    public function insertProvider()
    {
        // 投入するもの, 期待結果
        return [
            [-1, 0],
            [0, 0],
            [0.5, 0],
            [1, 0],
            [5, 0],
            [10, 10],
            [50, 50],
            [100, 100],
            [500, 500],
            [1000, 1000],
            [2000, 0],
            [5000, 0],
            [10000, 0],
            [array(10, 100), 0],
            ["はぴたす", 0],
        ];
    }

    /**
     * Unit Test: takeMoney (投入2回)
     *
     * @param $inserted1 int 1回目に投入するもの
     * @param $expected1 int 1回目投入の期待結果
     * @param $inserted2 int 2回目に投入するもの
     * @param $expected2 int 2回目投入の期待結果
     *
     * @return void
     *
     * @test
     * @dataProvider twiceInsertProvider
     */
    public function confirmTakeMoneyTwice($inserted1, $expected1, $inserted2, $expected2)
    {
        $this->assertequals($expected1, $this->vendingMachine->takeMoney($inserted1));
        $this->assertequals($expected2, $this->vendingMachine->takeMoney($inserted2));
    }

    /**
     * @return array
     */
    public function twiceInsertProvider()
    {
        // 順に
        // 1回目に投入するもの、1回目投入の期待結果
        // 2回目に投入するもの、2回目投入の期待結果
        return [
            [10, 10, 100, 110],
            [10, 10, 1, 10],
            [1, 0, 10, 10],
        ];
    }

    /**
     * Unit Test: payBack
     *
     * @return void
     *
     * @test
     */
    public function confirmPayBack()
    {
        $this->assertEquals(0, $this->vendingMachine->payBack());
    }

    /**
     * Unit Test: buyableJuice
     *
     * @param array  $insertMoney 投入するお金の配列
     * @param string $expected    期待する結果
     *
     * @return void
     *
     * @test
     * @dataProvider buyableProvider
     */
    public function confirmBuyableJuice($insertMoney, $expected)
    {
        foreach ($insertMoney as $insertMoneyItem) {
            $this->vendingMachine->takeMoney($insertMoneyItem);
        }
        $this->assertEquals($expected, $this->vendingMachine->buyableJuice());
    }

    /**
     * @return array
     */
    public function buyableProvider()
    {
        return [
            [[], []],
            [[100, 10], []],
            [[100, 10, 10], ["コーラ"]],
            [[100, 10, 10, 10], ["コーラ"]]
        ];
    }


    /**
     * Unit Test: buyJuice
     *
     * @param array  $insertMoney 投入するお金の配列
     * @param string $juiceName   買うジュースの名前
     * @param string $expected    期待する結果
     *
     * @return void
     *
     * @test
     * @dataProvider buyProvider
     */
    public function confirmBuyJuice($insertMoney, $juiceName, $expected)
    {
        foreach ($insertMoney as $insertMoneyItem) {
            $this->vendingMachine->takeMoney($insertMoneyItem);
        }
        $this->assertEquals($expected, $this->vendingMachine->buyJuice($juiceName));
    }

    /**
     * @return array
     */
    public function buyProvider()
    {
        return [
            [[],                "コーラ", null, 0],
            [[100, 10],         "コーラ", null, 110],
            [[100, 10, 10],     "コーラ", new Coke(), 0],
            [[100, 10, 10, 10], "コーラ", new Coke(), 10]
        ];
    }

    /**
     * Unit Test: buyJuice
     *
     * @param array   $insertMoney    投入するお金の配列
     * @param string  $juiceName      買うジュースの名前
     * @param string  $expected       期待する結果
     * @param integer $remainingMoney おつり
     *
     * @return void
     *
     * @test
     * @dataProvider buyProvider
     */
    public function confirmRemainingMoney($insertMoney, $juiceName, $expected, $remainingMoney)
    {
        foreach ($insertMoney as $insertMoneyItem) {
            $this->vendingMachine->takeMoney($insertMoneyItem);
        }
        $this->assertEquals($expected, $this->vendingMachine->buyJuice($juiceName));
        $this->assertEquals($remainingMoney, $this->vendingMachine->getTotal());
    }



}
