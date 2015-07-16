<?php

/**
 * 自動販売機クラス
 */
class VendingMachine
{
	/**
	 * お金管理
	 * @var MoneyBox
	 */
	private $_money_box;

	/**
	 * 釣り銭トレイ
	 * @var Tray
	 */
	public $tray;

	/**
	 * コンストラクタ
	 */
	public function __construct()
	{
		$this->_total = 0;
		$this->_money_box = new MoneyBox();

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
			return($this->_money_box->add_total($amount));
		}
		$this->tray->compute_amount($amount);
		// @fixme これどう考えてもダメ getterが欲しい (裏ワザ利用中)
		return ($this->_money_box->add_total(0));
	}

	/**
	 * 払い戻し
	 *
	 * 投入金額の総計を全額釣り銭トレイに返却する
	 *
	 * @return integer 投入金額の総計 (0しかない想定)
	 */
	public function pay_back()
	{
		$this->tray->compute_amount($this->_money_box->return_all());
		// @fixme これどう考えてもダメ getterが欲しい (裏ワザ利用中)
		return ($this->_money_box->add_total(0));
	}
}
