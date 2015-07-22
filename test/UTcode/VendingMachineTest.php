<?php

require_once 'src/app/VendingMachine.php';

class VendingMachineTest extends PHPUnit_Framework_TestCase
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
     * UnitTest: takeMoney (投入1回)
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
     * UnitTest: takeMoney (投入2回)
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
     * UnitTest: payBack
     *
     * @return void
     *
     * @test
     */
    public function confirmPayBack()
    {
        $this->assertEquals(0, $this->vendingMachine->payBack());
    }
}
