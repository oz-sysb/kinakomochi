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
		//お金はinegerしか許可しない、配列(複数のお金）の場合はそのまま吐き出して終わる
		$money_check = new MoneyCheck();
		//メソッドを呼ぶ
		//上のメソッドで許可されているお金かを確認する
		//許可されていないお金をそのまま返す
		if($money_check->is_valid_money($amount) === false)
		{
			$this->_return_money($amount);
		}
		else
		{
			//総計金額を数えて保管する
			$this->_total += $amount;
		}
		//総計金額が計算できたら
		return $this->_total;
	}

	/**
	 * お金を受け取るトレイにいれる（トレイに保管する）
	 *
	 * @param integer $money 返してほしい金額
	 *
	 * @return none
	 */
	private function _take_to_tray($money = null)
	{
		//トレイに金額を保管する
		$this->_tray += $money;
	}

	/**
	 * 全額を払い戻す
	 *
	 * @return none
	 */
	public function pay_back()
	{
		//保存されていた総計金額を返す
		//_reset_taken_money()で総計金額をリセットして、
		$this->_tray += $this->_total;
		$this->_total = 0;
	}

	/**
	 * 総計金額をゼロにする
	 *
	 * @return void
	 */
	private function _reset_taken_money()
	{
		//保存されている総計金額を返す
	}


}
