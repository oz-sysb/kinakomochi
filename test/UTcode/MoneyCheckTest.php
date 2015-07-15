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
	 * @dataProvider money_list
	 * @test
	 */
	public function test_validate_money($money, $expected)
	{
		$result = $this->money_check->validate_money($money);
		$this->assertEquals($result, $expected);
	}

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
