<?php
class JuiceBox
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
	public function set_information($juice)
	{
		$this->_juice[] = $juice;
		return $juice;
	}

	/**
	 * ジュースの情報を返す
	 * @param  string $juice_name ジュース名
	 * @return array
	 */
	public function return_information()
	{
		return $this->_juice;
	}
}
