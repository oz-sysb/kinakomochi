<?php

/**
 * Class VendingMachine　モデル的な役割
 */
class VendingMachine
{
	/**
	 * 投入さたお金を受け取る
	 *
	 * @param integer $amount 投入金額
	 *
	 * @return void
	 */
	public function take_money($money = null)
	{
		//お金はinegerしか許可しない、配列(複数のお金）の場合はそのまま吐き出して終わる
		//許可されているお金かを確認する
		//許可されていないお金をそのまま返す
		//合計金額を数えて保管する
		//合計値が計算できたら、成功したことを知らせる
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