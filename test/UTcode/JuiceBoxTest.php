<?php

require_once 'src/app/JuiceBox.php';

class JuiceBoxTest extends PHPUnit_Framework_TestCase
{
	/**
	 * @var JuiceBox
	 */
	private $_juice_box;

	/**
	 * @setup
	 */
	public function setUp()
	{
		$this->_juice_box = new JuiceBox();
	}

	/**
	 * 一回ジュース情報を渡す
	 *
	 * @test
	 * @dataProvider juice_list
	 * @param $inserted array 送る情報
	 * @param $expected array 期待結果
	 */
	public function set_juiceのテスト($inserted, $expected)
	{
		$this->assertequals($expected, $this->_juice_box->set_juice($inserted));
	}

	/**
	 * @return array
	 */
	public function juice_list()
	{
		return [
					[array('soda' => array("price" => 100, "number" => 2)),
					 array('soda' => array("price" => 100, "number" => 2))],
				];
	}

	/**
	 * ジュース情報の取得
	 *
	 * @test
	 * @dataProvider juice_list
	 * @param $inserted array 送る情報
	 * @param $expected array 期待結果
	 */
	public function get_juiceのテスト($inserted, $expected)
	{
		$this->assertequals($expected, $this->_juice_box->set_juice($inserted));
		$this->assertequals($expected, $this->_juice_box->get_juice());
	}

}
