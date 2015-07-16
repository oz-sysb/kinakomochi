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
		$this->_total = 0;
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
	 * 全額渡す
	 *
	 * @return integer
	 */
	public function return_all()
	{
		$total = $this->_total;
		$this->_total = 0;
		return $total;
	}
}
