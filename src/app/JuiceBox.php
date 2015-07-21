<?php
class juiceBox
{
	/**
	 * ジュース情報
	 * @var array
	 */
	private $_juice;

	/**
	 * コンストラクタ
	 */
	public function __construct()
	{
		//ジュースの配列を持っている
		$this->_juice = array('coke' => array("price" => 120, "number" => 5));
	}

	/**
	 * ジュースの情報を格納する
	 * 現状ではこのメソッド呼ぶと初期状態が破棄されます。
	 * @todo コンストラクタで格納するならこれ要らないんじゃの確認。
	 *
	 * @param  array $juice ジュース情報
	 * @return array
	 */
	public function set_juice($juice)
	{
		$this->_juice = $juice;
		return $juice;
	}

	/**
	 * ジュースの情報を返す
	 *
	 * @return array
	 */
	public function get_juice()
	{
		return $this->_juice;
	}
}
