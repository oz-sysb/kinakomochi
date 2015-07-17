<?php
class MoneyBox
{
	/**
	 * 総計金額
	 *
	 * @var integer
	 */
	private $_total;

	/**
	 * コンストラクタ
	 * @return void
	 */
	public function __construct()
	{
		$this->total_clear();
	}

	/**
	 * 投入金額を加算する
	 *
	 * @param integer $amount 投入金額
	 * @return integer
	 */
	public function add_total($amount)
	{
		$this->_total += $amount;
		return $this->_total;
	}

	/**
	 * 投入された金額の総計を返す
	 *
	 * @return integer
	 */
	public function get_total()
	{
		return $this->_total;
	}

	/**
	 * totalを初期化する
	 *
	 * @return integer
	 */
	public function total_clear()
	{
		$this->_total = 0;
		return $this->_total;
	}
}
