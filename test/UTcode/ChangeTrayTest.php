<?php
namespace VendingMachineUnitTest;

use VendingMachine\ChangeTray;

class ChangeTrayTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ChangeTray
     */
    private $changeTray;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->changeTray = new ChangeTray();
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
        $this->assertEquals($expected, $this->changeTray->computeAmount($add));
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
        $this->changeTray->computeAmount($refund1);
        $this->changeTray->computeAmount($refund2);
        $this->assertEquals($change, $this->changeTray->getAmount());
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
