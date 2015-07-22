<?php

/**
 * PHP version 5.6
 *
 * @category VendingMachine
 * @package  UnitTest
 * @author   Yuko Terashima <y-terashima@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */

require_once 'src/app/MoneyCheck.php';

/**
 * Class MoneyCheckTest
 *
 * @category VendingMachine
 * @package  UnitTest
 * @author   Yuko Terashima <y-terashima@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
class MoneyCheckTest extends PHPUnit_Framework_TestCase
{
    /**
     * テスト対象
     *
     * @var MoneyCheck
     */
    private $_moneyCheck;

    /**
     * 事前処理
     *
     * @return void
     *
     * @setup
     */
    public function setUp()
    {
        $this->_moneyCheck = new MoneyCheck();
    }

    /**
     * UnitTest: validateMoney
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
        $result = $this->_moneyCheck->validateMoney($money);
        $this->assertEquals($result, $expected);
    }

    /**
     * DataProvider
     *
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
