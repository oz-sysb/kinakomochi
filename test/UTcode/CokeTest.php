<?php
namespace VendingMachineUnitTest;

use VendingMachine\existence as eee;

class CokeTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * @var eee\Coke
	 */
	private $coke;

	/**
	 * @setup
	 */
	public function setUp()
	{
			$this->coke = new eee\Coke();
	}

	public function test_aaa()
	{
			$this->assertequals("コーラ", $this->coke->getName());
	}
}
