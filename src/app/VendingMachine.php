<?php
require_once('Moneybox.php');
require_once('Tray.php');
require_once('Moneycheck.php');
require_once('JuiceBox.php');
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
		$this->_money_box = new MoneyBox();
		$this->tray = new Tray();
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

		return $this->_money_box->get_total();
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
		$this->tray->compute_amount($this->_money_box->get_total());
		$this->_money_box->clear_total();

		return $this->tray->get_amount();
	}

	/**
	 * ジュース情報を返却する
	 *
	 * @return array
	 */
	public function take_juice_information()
	{
		$juice_box = new JuiceBox();
		$juice_data = $juice_box->return_information();
		//TODO 考え中
		return "コーラ 120円 在庫 5本";
	}
}
