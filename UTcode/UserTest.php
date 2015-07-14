<?php
#
require_once 'PHPUnit/Autoload.php';
require_once '../app/User.php';

class UserTest extends PHPUnit_Framework_TestCase
{
	protected $object;

	/**
	 * setup
	 */
	public function setUp()
	{
		$this->object = new User();
	}

	/**
	 * teardown
	 */
	public function tearDown()
	{
		unset($this->object);
	}

	public function test_put_money()
	{
		$this->object->put_money(10);
		echo "voidなので今なにもできん1\n";
	}

	public function test_pay_back()
	{
		$this->assertTrue($this->object->pay_back());

	}

	public function test_get_money_from_tray()
	{
		$this->assertEquals(0,$this->object->get_money_from_tray());
	}
}
