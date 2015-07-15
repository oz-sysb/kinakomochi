<?php

require_once('MoneyCheck.php');
require_once('Tray.php');

/**
 * 自動販売機クラス
 */
class VendingMachine
{
	/**
	 * 投入金額の総計
	 */
	private $_total;

	/**
	 * 釣り銭トレイ
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
	 * 投入金額を受け取る
	 *
	 * 扱えるお金の場合  ：投入金額の総計を加算する
	 * 扱えないお金の場合：釣り銭トレイに返却する
	 *
	 * @param integer $amount 投入金額
	 *
	 * @return integer 投入金額の総計
	 */
	public function take_money($amount = null)
	{
		$money_check = new MoneyCheck();
		if($money_check->validate_money($amount))
		{
			return $this->_total += $amount;
		}
		$this->tray->compute_amount($amount);
		return $this->_total;
	}

	/**
	 * 払い戻し
	 *
	 * 投入金額の総計を釣り銭トレイに返却し、
	 * 返却が成功したら、投入金額の総計を0に設定する
	 * 成功しなかったら何もしない
	 *
	 * @return boolean 払い戻しと金額リセットが成功したか
	 */
	public function pay_back()
	{
		if(TRUE === $this->tray->compute_amount($this->_total))
		{
			$this->_total = 0;
			return TRUE;
		}
		return FALSE;
	}
}