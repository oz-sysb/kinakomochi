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

require_once 'src/app/JuiceBox.php';

/**
 * Class JuiceBoxTest
 *
 * @category VendingMachine
 * @package  UnitTest
 * @author   Sora Hashimoto <s-hashimoto@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
class JuiceBoxTest extends PHPUnit_Framework_TestCase
{
    /**
     * テスト対象
     *
     * @var JuiceBox
     */
    private $_juiceBox;

    /**
     * 事前処理
     *
     * @return void
     *
     * @setup
     */
    public function setUp()
    {
        $this->_juiceBox = new JuiceBox();
    }

    /**
     * 初期状態の確認
     *
     * @return void
     *
     * @test
     * @fixme 初期値をテストコードが知っているダメな例
     */
    public function confirmConstructor()
    {
        $initData = ['コーラ' => ["price" => 120, "number" => 5]];
        $this->assertequals($initData, $this->_juiceBox->getJuice());
    }

    /**
     * UnitTest: setJuice
     * UnitTest: getJuice
     *
     * @param array $juice ジュース情報
     *
     * @return void
     *
     * @test
     * @dataProvider juiceProvider
     */
    public function confirmSetGetJuice($juice)
    {
        $this->_juiceBox->setJuice($juice);
        $this->assertequals($juice, $this->_juiceBox->getJuice());
    }

    /**
     * DataProvider
     *
     * @return array
     */
    public function juiceProvider()
    {
        return [
            [['レッドブル' => ["price" => 200, "number" => 2]]],
        ];
    }
}
