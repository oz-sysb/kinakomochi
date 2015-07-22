<?php

/**
 * PHP version 5.6
 *
 * @category VendingMachine
 * @package  UnitTest
 * @author   Sora Hashimoto <s-hashimoto@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
require_once 'src/app/MoneyBox.php';

/**
 * Class MoneyBoxTest
 *
 * @category VendingMachine
 * @package  UnitTest
 * @author   Sora Hashimoto <s-hashimoto@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
class MoneyBoxTest extends PHPUnit_Framework_TestCase
{
    /**
     * テスト対象
     *
     * @var MoneyBox
     */
    private $_moneyBox;

    /**
     * 事前処理
     *
     * @return void
     *
     * @setup
     */
    public function setUp()
    {
        $this->_moneyBox = new MoneyBox();
    }

    /**
     * Unit Test: addTotal
     *
     * @return void
     *
     * @dataProvider moneyProvider
     * @test
     */
    public function test_add_total($money)
    {
        $result = $this->_moneyBox->addTotal($money);
        $this->assertEquals($result, $money);
    }

    /**
     * DataProvider
     *
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
