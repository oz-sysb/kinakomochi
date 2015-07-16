<?php

require_once 'src/app/MoneyCheck.php';

class MoneyCheckTest extends PHPUnit_Framework_TestCase
{
	/** @var MoneyCheck */
	private $money_check;

	/**
	 * @setup
	 */
	public function setUp()
	{
		$this->money_check = new MoneyCheck();
	}

	/**
	 * 正しいお金だけOKにする
	 *
	 * @test
	 * @dataProvider money_list
	 * @@aram $money    integer お金
	 * @param $expected boolean 期待結果
	 */
	public function 正しいお金だけOKにする($money, $expected)
	{
		$result = $this->money_check->validate_money($money);
		$this->assertEquals($result, $expected);
	}

	/**
	 * @return array
	 */
	public function money_list()
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
