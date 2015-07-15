<?php

require_once 'app/Tray.php';

class TrayTest extends PHPUnit_Framework_TestCase
{
	protected $object;

	public function setUp()
	{
		$this->object = new Tray();
	}

	/**
	 * teardown
	 */
	public function tearDown()
	{
		unset($this->object);
	}

	public function test_compute_amountを呼ぶINTを渡す()
	{
		$this->assertTrue($this->object->compute_amount(100));
		$this->assertTrue($this->object->compute_amount(100));
	}

	public function test_compute_amountを呼ぶ小数値を渡す()
	{
		$this->assertFalse($this->object->compute_amount(1.1));
	}

	public function test_compute_amountを呼ぶ配列を渡す()
	{
		$this->assertFalse($this->object->compute_amount(array(1,1)));
		$this->assertFalse($this->object->compute_amount(array("a"=>1)));
	}

	public function test_get_amountを呼ぶ()
	{
		$this->object->compute_amount(100);
		$this->object->compute_amount(100);
		$this->assertEquals(200, $this->object->get_amount());
	}

	public function test_get_amountを呼ぶ減算パターン()
	{
		$this->object->compute_amount(100);
		$this->object->compute_amount(-100);
		$this->assertEquals(0, $this->object->get_amount());
	}
}
