<?php

require_once 'app/MoneyCheck.php';

class MoneyCheckTest extends PHPUnit_Framework_TestCase
{
	protected $object;

	/**
	 * setup
	 */
	public function setUp()
	{
		$this->object = new MoneyCheck();
	}

	/**
	 * teardown
	 */
	public function tearDown()
	{
		unset($this->object);
	}

	public function test_validate_money_正常系()
	{
		$this->assertTrue($this->object->validate_money(10));
		$this->assertTrue($this->object->validate_money(50));
		$this->assertTrue($this->object->validate_money(100));
		$this->assertTrue($this->object->validate_money(500));
		$this->assertTrue($this->object->validate_money(1000));
	}

	public function test_validate_money_異常系()
	{
		$this->assertFalse($this->object->validate_money(1));
		$this->assertFalse($this->object->validate_money(5));
		$this->assertFalse($this->object->validate_money(2000));
		$this->assertFalse($this->object->validate_money(5000));
		$this->assertFalse($this->object->validate_money(10000));
	}
}
