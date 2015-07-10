<?php

require_once('MoneyCheck.php');

/**
 * Class VendingMachine　モデル的な役割
 */
class VendingMachine
{
	/**
	 * 総計金額
	 */
	private $_total;

	/**
	 * トレイ
	 */
	private $_tray;

	/**
	 * コンストラクタ
	 */
	public function __construct()
	{
		$this->_total = 0;
		$this->_tray  = 0;
	}

	/**
	 * 投入されたお金を受け取る
	 *
	 * @param integer $amount 投入金額
	 *
	 * @return integer 総計金額
	 */
	public function take_money($amount = null)
	{
		$money_check = new MoneyCheck();
		if($money_check->is_valid_money($amount) === false)
		{
			$this->_take_to_tray($amount);
		}
		else
		{
			$this->_total += $amount;
		}
		return $this->_total;
	}

	/**
	 * お金を受け取るトレイにいれる（トレイに保管する）
	 *
	 * @param integer $money 返してほしい金額
	 *
	 * @return none
	 */
	private function _take_to_tray($amount = null)
	{
		$this->_tray += $amount;
	}

	/**
	 * 全額を払い戻す
	 *
	 * @return none
	 */
	public function pay_back()
	{
		$this->_tray += $this->_total;
		$this->_total = 0;
	}
}
