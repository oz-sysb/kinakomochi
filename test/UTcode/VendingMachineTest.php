<?php

require_once 'src/app/VendingMachine.php';

/**
 * VendingMachineクラスのUnitTest
 */
class VendingMachineTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var VendingMachine
	 */
	private $vending_machine;

	/**
	 * @setup
	 */
	public function setUp()
	{
		$this->vending_machine = new VendingMachine();
	}

	/**
	 * なにかを1回投入する。数値は金額のつもり。
	 *
	 * @test
	 * @dataProvider insert_list
	 * @param $inserted int 投入されるもの
	 * @param $expected int 期待結果
	 */
	public function なにかを1回投入する($inserted, $expected)
	{
		$this->assertequals($expected, $this->vending_machine->take_money($inserted));
	}

	/**
	 * @return array
	 */
	public function insert_list()
	{
		// 投入するもの, 期待結果
		return [
			[-1, 0],
			[0, 0],
			[0.5, 0],
			[1, 0],
			[5, 0],
			[10, 10],
			[50, 50],
			[100, 100],
			[500, 500],
			[1000, 1000],
			[2000, 0],
			[5000, 0],
			[10000, 0],
			[array(10,100), 0],
			["はぴたす", 0],
		];
	}

	/**
	 * なにかを2回投入する。数値は金額のつもり。
	 *
	 * @test
	 * @dataProvider insert_twice_list
	 * @param $inserted1 int 1回目に投入するもの
	 * @param $expected1 int 1回目投入の期待結果
	 * @param $inserted2 int 2回目に投入するもの
	 * @param $expected2 int 2回目投入の期待結果
	 */
	public function なにかを2回投入する($inserted1, $expected1, $inserted2, $expected2)
	{
		$this->assertequals($expected1, $this->vending_machine->take_money($inserted1));
		$this->assertequals($expected2, $this->vending_machine->take_money($inserted2));
	}

	/**
	 * @return array
	 */
	public function insert_twice_list()
	{
		// 1回目に投入するもの、1回目投入の期待結果、2回目に投入するもの、2回目投入の期待結果
		return [
			[10, 10, 100, 110],
			[10, 10, 1, 10],
			[1, 0, 10, 10],
		];
	}

	/**
	 * @test
	 */
	public function 払い戻す()
	{
		$this->assertEquals(0, $this->vending_machine->pay_back());
	}


}