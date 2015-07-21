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
	 * 初期状態の確認
	 *
	 * @test
	 * @fixme 初期値をテストコードが知っているダメな例だとは思う
	 */
	public function 初期状態の確認()
	{
		$this->assertequals(array('コーラ' => array("price" => 120, "number" => 5)), $this->_juice_box->get_juice());
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
					[array('レッドブル' => array("price" => 200, "number" => 2)),
					 array('レッドブル' => array("price" => 200, "number" => 2))],
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
