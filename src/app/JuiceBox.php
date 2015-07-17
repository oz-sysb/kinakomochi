<?php
class juiceBox
{
	/**
	 * ジュース情報
	 */
	private $_juice;

	/**
	 * コンストラクタ
	 */
	public function __construct()
	{
		//ジュースの配列を持っている
		$this->_juice = array('coke'=>array("price"=>120, "number" => 5));
	}

	/**
	 * ジュースの情報を格納する
	 * @param  array $juice ジュース情報
	 * @return array
	 */
	public function get_infomation($juice)
	{
		$this->juice[] = $juice;
		return $juice;
	}

	/**
	 * ジュースの情報を返す
	 * @param  string $juice_name ジュース名
	 * @return array
	 */
	public function return_infomation()
	{
		return $this->juice;
	}
}
