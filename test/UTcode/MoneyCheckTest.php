<?php

namespace VendingMachineTest\UTcode;

use VendingMachine\app\MoneyCheck;

class MoneyCheckTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var MoneyCheck
     */
    private $moneyCheck;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->moneyCheck = new MoneyCheck();
    }

    /**
     * Unit Test: validateMoney
     *
     * @param integer $money    お金
     * @param boolean $expected 期待結果
     *
     * @return void
     *
     * @test
     * @dataProvider moneyValidator
     */
    public function validateMoneyTest($money, $expected)
    {
        $result = $this->moneyCheck->validateMoney($money);
        $this->assertEquals($result, $expected);
    }

    /**
     * @return array
     */
    public function moneyValidator()
    {
        return [
            [1, false],
            [5, false],
            [10, true],
            [50, true],
            [100, true],
            [500, true],
            [1000, true],
            [2000, false],
            [5000, false],
            [10000, false]
        ];
    }
}
