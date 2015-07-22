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
     * @var Tray
     */
    private $_tray;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->_tray = new Tray();
    }

    /**
     * 釣り銭トレイ内に足す
     *
     * @test
     * @dataProvider add_list
     * @param $add      integer 足すもの
     * @param $expected boolean 期待結果
     */
    public function 釣り銭トレイ内に足す($add, $expected)
    {
        $this->assertEquals($expected, $this->_tray->computeAmount($add));
    }

    /**
     * @return array
     */
    public function add_list()
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
     * @test
     * @dataProvider amount_change_list
     * @param $refund1 integer 1回目の返却金額
     * @param $refund2 integer 2回目の返却金額
     * @param $change  integer 現在の釣り銭
     */
    public function 釣り銭トレイにあるお金の確認($refund1, $refund2, $change)
    {
        $this->_tray->computeAmount($refund1);
        $this->_tray->computeAmount($refund2);
        $this->assertEquals($change, $this->_tray->getAmount());
    }

    /**
     * @return array
     */
    public function amount_change_list()
    {
        // 1回目の返却金額、2回目の返却金額、現在の釣り銭
        return [
            [100, 100, 200],
            [100, -100, 0],
        ];
    }
}
