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

	/**
	 * 値の判定はVendingMachineのtake_moneyで行われるので、VendingMachineのtake_moneyのテストでその部分をカバーする
	 * ここではあくまでも基本的な正常動作を確認したい
	 */
	public function test_put_money_100円を投入する()
	{
		$this->assertEquals(100, $this->object->put_money(100));
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
