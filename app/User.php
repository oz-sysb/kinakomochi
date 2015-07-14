<?php

/**
 * Class User インターフェースを担当する
 */
class User
{
	/**
	 * 投入する（ユーザーの操作）
	 * 引数の$moneyはVendingMoneyで使えるお金かチェックをしてもらうからここで引数の確認はいらない
	 *
	 * @param integer $money 投入するお金
	 *
	 * @return integer 投入金額の総計
	 */
	public function put_money($money = null)
	{
		//VendingMachineのtake_moneyにそのままお金を渡して、戻り値を判定しないで返す（トレイに保管されているお金を取り出す時は別の処理を動く）
		$vending_machine = new VendingMachine();
		return $vending_machine->take_money($money);
	}

	/**
	 * 払い戻し（ユーザーの操作）
	 *
	 * @return integer|null
	 */
	public function pay_back()
	{
		$vending_machine = new VendingMachine();
		return $vending_machine->pay_back();
	}

	/**
	 * お金を受け取るトレイから出す（ユーザーの操作）
	 * この関数が動作するのはput_moneyが動いてから
	 *
	 * @return integer|null
	 */
	public function get_money_from_tray()
	{
		$tray = new Tray();
		return $tray->get_amount();
	}
}