<?php

require_once 'PHPUnit/Autoload.php';
require_once '../app/VendingMachine.php';

/**
 * VendingMachineクラスのUnitTest
 */
class VendingMachineTest extends PHPUnit_Framework_TestCase
{

	protected $object;

	/**
	 * setup
	 */
	public function setUp()
	{
		$this->object = new VendingMachine();
	}

	/**
	 * teardown
	 */
	public function tearDown()
	{
		unset($this->object);
	}

	/**
	 *
	 */
	public function test_take_money_10円を入れる()
	{
		$this->assertequals($this->object->take_money(10), 10);
	}

	public function test_take_money_50円を入れる()
	{
		$this->assertequals($this->object->take_money(50), 50);
	}

	public function test_take_money_100円を入れる()
	{
		$this->assertequals($this->object->take_money(100), 100);
	}

	public function test_take_money_500円を入れる()
	{
		$this->assertequals($this->object->take_money(500), 500);
	}

	public function test_take_money_1000円を入れる()
	{
		$this->assertequals($this->object->take_money(1000), 1000);
	}

	public function test_take_money_1円を入れる()
	{
		$this->assertequals($this->object->take_money(1), 0);
	}

	public function test_take_money_5円を入れる()
	{
		$this->assertequals($this->object->take_money(5), 0);
	}

	public function test_take_money_10円と100円を入れる()
	{
		$this->assertequals($this->object->take_money(10), 10);
		$this->assertequals($this->object->take_money(100), 110);
	}

	public function test_take_money_10円と1円を入れる()
	{
		$this->assertequals($this->object->take_money(10), 10);
		$this->assertequals($this->object->take_money(1), 10);
	}

	public function test_take_money_1円と10円を入れる()
	{
		$this->assertequals($this->object->take_money(1), 0);
		$this->assertequals($this->object->take_money(10), 10);
	}
}
