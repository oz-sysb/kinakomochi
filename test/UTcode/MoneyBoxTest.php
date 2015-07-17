<?php

require_once 'src/app/MoneyBox.php';

class MoneyBoxTest extends PHPUnit_Framework_TestCase
{
	/** @var MoneyCheck */
	private $money_box;

	/**
	 * @setup
	 */
	public function setUp()
	{
		$this->money_box = new MoneyBox();
	}

	/**
	 * @dataProvider money_list
	 * @test
	 */
	public function test_add_total($money)
	{
		$result = $this->money_box->add_total($money);
		$this->assertEquals($result, $money);
	}

	/**
	 * お金リスト
	 * @return array
	 */
	public function money_list()
	{
		return [
					[1],
					[5],
					[10],
					[50],
					[100],
					[500],
					[1000],
					[2000],
					[5000],
					[10000]
				];
	}

	/**
	 * お金リスト
	 * @return array
	 */
	public function total_list()
	{
		return [
					[10,50,100,160],
					[50,5000,500,5550],
					[10000,1,5,10006]
				];
	}

}
