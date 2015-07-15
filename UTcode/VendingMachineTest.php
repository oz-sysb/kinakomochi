<?php

require_once 'app/VendingMachine.php';

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
	 * take_money() のテスト
	 */
	public function test_take_money_10円を入れる()
	{
		$this->assertequals(10, $this->object->take_money(10));
	}

	public function test_take_money_50円を入れる()
	{
		$this->assertequals(50, $this->object->take_money(50));
	}

	public function test_take_money_100円を入れる()
	{
		$this->assertequals(100, $this->object->take_money(100));
	}

	public function test_take_money_500円を入れる()
	{
		$this->assertequals(500, $this->object->take_money(500));
	}

	public function test_take_money_1000円を入れる()
	{
		$this->assertequals(1000, $this->object->take_money(1000));
	}

	public function test_take_money_1円を入れる()
	{
		$this->assertequals(0, $this->object->take_money(1));
	}

	public function test_take_money_5円を入れる()
	{
		$this->assertequals(0, $this->object->take_money(5));
	}

	public function test_take_money_2000円を入れる()
	{
		$this->assertequals(0, $this->object->take_money(2000));
	}

	public function test_take_money_5000円を入れる()
	{
		$this->assertequals(0, $this->object->take_money(5000));
	}

	public function test_take_money_10000円を入れる()
	{
		$this->assertequals(0, $this->object->take_money(10000));
	}

	public function test_take_money_10円と100円を入れる()
	{
		$this->assertequals(10, $this->object->take_money(10));
		$this->assertequals(110, $this->object->take_money(100));
	}

	public function test_take_money_10円と1円を入れる()
	{
		$this->assertequals(10, $this->object->take_money(10));
		$this->assertequals(10, $this->object->take_money(1));
	}

	public function test_take_money_1円と10円を入れる()
	{
		$this->assertequals(0, $this->object->take_money(1));
		$this->assertequals(10, $this->object->take_money(10));
	}

	public function test_take_money_10円と100円を一緒に入れる()
	{
		$this->assertequals(0, $this->object->take_money(array(10, 100)));
	}

	public function test_pay_back_初期状態()
	{
		$this->assertTrue($this->object->pay_back());
	}


}