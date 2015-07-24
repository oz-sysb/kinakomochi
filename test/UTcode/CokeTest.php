<?php
namespace VendingMachineUnitTest;

use VendingMachine\existence\Coke;

class CokeTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var Coke
	 */
	private $coke;

	/**
	 * @setup
	 */
	public function setUp()
	{
			$this->coke = new Coke();
	}

	public function test_aaa()
	{
			$this->assertequals("コーラ", $this->coke->getName());
	}
}
