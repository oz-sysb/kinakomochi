<?php

/**
 * PHP version 5.6
 *
 * @category VendingMachine
 * @package  ValidatorTest
 * @author   Sora Hashimoto <s-hashimoto@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */

require_once 'src/app/MoneyCheck.php';

/**
 * Class MoneyCheckTest
 *
 * @category VendingMachine
 * @package  ValidatorTest
 * @author   Sora Hashimoto <s-hashimoto@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
class MoneyCheckTest extends PHPUnit_Framework_TestCase
{
    /**
     * Target Object
     *
     * @var MoneyCheck
     */
    private $_moneyCheck;

    /**
     * SetUp for Unit Test
     *
     * @setup
     * @return void
     */
    public function setUp()
    {
        $this->_moneyCheck = new MoneyCheck();
    }

    /**
     * Unit Test for validateMoney
     *
     * @param integer $money    お金
     * @param boolean $expected 期待結果
     *
     * @test
     * @dataProvider moneyValidator
     * @return       void
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
