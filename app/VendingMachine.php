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
	 * 投入されたお金を受け取る
	 *
	 * @param integer $amount 投入金額
	 *
	 * @return boolean
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
			return false;
		}
		//合計金額を数えて保管する
		$this->_total += $amount;
		//合計値が計算できたら、成功したことを知らせる
		return true;
	}

	/**
	 * お金を受け取るトレイにいれる（トレイに保管する）
	 *
	 * @param integer $money 返してほしい金額
	 *
	 * @return integer
	 */
	private function _return_money($money = null)
	{
		//トレイに金額を保管する
	}

	/**
	 * 全額を返す
	 *
	 * @return integer
	 */
	public function return_all_money()
	{
		//_reset_taken_money()で合計値をリセットして、
		//保存されていた合計値を返す
	}

	/**
	 * 合計値をゼロにする
	 *
	 * @return void
	 */
	private function _reset_taken_money()
	{
		//保存されている合計値を返す
	}

}
