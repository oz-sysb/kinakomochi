<?php
namespace VendingMachineUnitTest;

use VendingMachine\Tray;

class TrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Tray
     */
    private $tray;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->tray = new Tray();
    }

    /**
     * Unit Test: computeAmount
     *
     * @param integer $add      足すもの
     * @param boolean $expected 期待結果
     *
     * @return void
     *
     * @test
     * @dataProvider addProvider
     */
    public function confirmComputeAmount($add, $expected)
    {
        $this->assertEquals($expected, $this->tray->computeAmount($add));
    }

    /**
     * @return array
     */
    public function addProvider()
    {
        // 足すもの, 期待結果
        return [
            [100, true],
            [1.1, false],
            [array(1,1), false],
            [array("a"=>1), false],

        ];
    }

    /**
     * Unit Test: getAmount
     *
     * @param integer $refund1 1回目の返却金額
     * @param integer $refund2 2回目の返却金額
     * @param integer $change  現在の釣り銭
     *
     * @return void
     *
     * @test
     * @dataProvider changeProvider
     */
    public function confirmGetAmount($refund1, $refund2, $change)
    {
        $this->tray->computeAmount($refund1);
        $this->tray->computeAmount($refund2);
        $this->assertEquals($change, $this->tray->getAmount());
    }

    /**
     * @return array
     */
    public function changeProvider()
    {
        // 1回目の返却金額、2回目の返却金額、現在の釣り銭
        return [
            [100, 100, 200],
            [100, -100, 0],
        ];
    }
}
