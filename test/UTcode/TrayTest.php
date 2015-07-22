<?php

/**
 * PHP version 5.6
 *
 * @category VendingMachine
 * @package  UnitTest
 * @author   Shunsuke Sakuma <s-sakuma@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */

require_once 'src/app/Tray.php';

/**
 * Class TrayTest
 *
 * @category VendingMachine
 * @package  UnitTest
 * @author   Shunsuke Sakuma <s-sakuma@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
class TrayTest extends PHPUnit_Framework_TestCase
{
    /**
     * テスト対象
     *
     * @var Tray
     */
    private $tray;

    /**
     * 事前処理
     *
     * @return void
     *
     * @setup
     */
    public function setUp()
    {
        $this->tray = new Tray();
    }

    /**
     * 釣り銭トレイ内に足す
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
     * DataProvider
     *
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
     * 釣り銭トレイにあるお金の確認
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
     * DataProvider
     *
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
