<?php
#
require_once 'PHPUnit/Autoload.php';
require_once '../app/Tray.php';

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

	/**
	 * 今は、何を渡してもTrueが返っちゃうよ。（0以外）
	 * 修正してね
	 */
	public function test_add_amountを呼ぶ()
	{
		$this->assertTrue($this->object->add_amount(1.1));
	}

	public function test_get_amountを呼ぶ()
	{
		$this->object->add_amount(100);
		$this->object->add_amount(100);
		$this->assertEquals(200, $this->object->get_amount());
	}
//	public function test_get_moneyを呼ぶ()
//	{
//		$this->object->get_money();
//	}
}
