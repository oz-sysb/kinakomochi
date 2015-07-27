<?php
namespace VendingMachineUnitTest;

use VendingMachine\JuiceBox;
use VendingMachine\existence\Coke;

class JuiceBoxTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var JuiceBox
     */
    private $juiceBox;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->juiceBox = new JuiceBox();
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
        $initData = new Coke();
        $this->assertequals($initData, $this->juiceBox->getJuice());
    }

    /**
     * Unit Test: setJuice
     * Unit Test: getJuice
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
        $this->juiceBox->setJuice($juice);
        $this->assertequals($juice, $this->juiceBox->getJuice());
    }

    /**
     * @return array
     */
    public function juiceProvider()
    {
        return [
            [['レッドブル' => ["price" => 200, "number" => 2]]],
        ];
    }
}
