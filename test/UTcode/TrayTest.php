<?php

require_once 'app/Tray.php';

class TrayTest extends PHPUnit_Framework_TestCase
{
	/** @var Tray */
	private $tray;

	/**
	 * @setup
	 */
	public function setUp()
	{
		$this->tray = new Tray();
	}

	/**
	 * @test
	 */
	public function test_compute_amountを呼ぶINTを渡す()
	{
		$this->assertTrue($this->tray->compute_amount(100));
		$this->assertTrue($this->tray->compute_amount(100));
	}

	/**
	 * @test
	 */
	public function test_compute_amountを呼ぶ小数値を渡す()
	{
		$this->assertFalse($this->tray->compute_amount(1.1));
	}

	/**
	 * @test
	 */
	public function test_compute_amountを呼ぶ配列を渡す()
	{
		$this->assertFalse($this->tray->compute_amount(array(1,1)));
		$this->assertFalse($this->tray->compute_amount(array("a"=>1)));
	}

	/**
	 * @test
	 */
	public function test_get_amountを呼ぶ()
	{
		$this->tray->compute_amount(100);
		$this->tray->compute_amount(100);
		$this->assertEquals(200, $this->tray->get_amount());
	}

	/**
	 * @test
	 */
	public function test_get_amountを呼ぶ減算パターン()
	{
		$this->tray->compute_amount(100);
		$this->tray->compute_amount(-100);
		$this->assertEquals(0, $this->tray->get_amount());
	}
}
