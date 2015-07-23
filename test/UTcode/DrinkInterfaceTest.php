<?php
namespace VendingMachineUnitTest;

use VendingMachine\existence\DrinkInterface;

class DrinkInterfaceTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var drinkInterface
	 */
	private $drinkInterface;

	/**
	 * @setup
	 */
	public function setUp()
	{
			$this->drinkInterface = new DrinkInterface();
	}

	public function ドリンクオブジェクトの名前を取得する()
	{
			$this->assertequals("コーラ", $this->drinkInterface->getName());
	}
}
