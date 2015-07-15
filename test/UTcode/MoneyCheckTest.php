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
	 * @test
	 */
	public function test_validate_money_正常系()
	{
		$this->assertTrue($this->money_check->validate_money(10));
		$this->assertTrue($this->money_check->validate_money(50));
		$this->assertTrue($this->money_check->validate_money(100));
		$this->assertTrue($this->money_check->validate_money(500));
		$this->assertTrue($this->money_check->validate_money(1000));
	}

	/**
	 * @test
	 */
	public function test_validate_money_異常系()
	{
		$this->assertFalse($this->money_check->validate_money(1));
		$this->assertFalse($this->money_check->validate_money(5));
		$this->assertFalse($this->money_check->validate_money(2000));
		$this->assertFalse($this->money_check->validate_money(5000));
		$this->assertFalse($this->money_check->validate_money(10000));
	}
}
