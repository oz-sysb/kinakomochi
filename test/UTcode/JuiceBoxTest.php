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
	 * 登録後の確認
	 *
	 * @test
	 * @dataProvider juice_list
	 * @param $juice array ジュース情報
	 */
	public function set_juiceのテスト($juice)
	{
		$this->_juice_box->set_juice($juice);
		$this->assertequals($juice, $this->_juice_box->get_juice());
	}

	/**
	 * @return array
	 */
	public function juice_list()
	{
		return [
					[array('レッドブル' => array("price" => 200, "number" => 2))],
				];
	}
}
