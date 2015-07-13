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

	public function test_get_money()
	{
		$this->object->get_money();
		echo "voidなので今なにもできん2\n";
	}

	public function test_get_money_from_tray()
	{
		$this->object->get_money_from_tray();
		echo "voidなので今なにもできん3\n";
	}
}
