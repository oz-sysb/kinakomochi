<?php

require_once 'src/app/MoneyBox.php';

class MoneyBoxTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var MoneyBox
     */
    private $moneyBox;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->moneyBox = new MoneyBox();
    }

    /**
     * Unit Test: addTotal
     *
     * @param integer $money 加算金額
     *
     * @return void
     *
     * @dataProvider moneyProvider
     * @test
     */
    public function confirmAddTotal($money)
    {
        $result = $this->moneyBox->addTotal($money);
        $this->assertEquals($result, $money);
    }

    /**
     * @return array
     */
    public function moneyProvider()
    {
        return [
            [1],
            [5],
            [10],
            [50],
            [100],
            [500],
            [1000],
            [2000],
            [5000],
            [10000]
        ];
    }
}
