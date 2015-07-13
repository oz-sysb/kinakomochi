<?php

/**
 * Class User インターフェースを担当する
 */
class User
{
	/**
	 * 投入する（ユーザーの操作）
	 *
	 * @param integer $money 投入するお金
	 *
	 * @return void
	 */
	public function put_money($money = null)
	{
		//VendingMachineのtake_moneyにそのままお金を渡して、戻り値を見ない（トレイに保管されているお金を取り出す時は別の処理を動く）
	}

	/**
	 * 払い戻し（ユーザーの操作）
	 *
	 * @return integer|null
	 */
	public function get_money()
	{
		//VendingMachineのreturn_all_money()を呼び出して、
		//終了する
	}

	/**
	 * お金を受け取るトレイから出す（ユーザーの操作）
	 *
	 * @return integer|null
	 */
	public function get_money_from_tray()
	{
		$tray = new Tray();
		return $tray->get_amount();
	}
}