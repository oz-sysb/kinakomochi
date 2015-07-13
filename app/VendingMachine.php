<?php

require_once('MoneyCheck.php');
require_once('Tray.php');

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
	public $tray;

	/**
	 * コンストラクタ
	 */
	public function __construct()
	{
		$this->_total = 0;
		$this->tray  = new Tray();
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
		if($money_check->validate_money($amount))
		{
			$this->_total += $amount;
		}
		else
		{
			$this->tray->add_amount($amount);
		}
		return $this->_total;
	}

	/**
	 * 全額を払い戻す
	 *
	 * @return void
	 */
	public function pay_back()
	{
		$this->tray->add_amount($this->_total);
		$this->_total = 0;
	}
}
