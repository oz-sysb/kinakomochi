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
	 * @return void
	 */
	public function put_money($money = null)
	{
		//VendingMachineのtake_moneyにそのままお金を渡して、戻り値を見ない（トレイに保管されているお金を取り出す時は別の処理を動く）
		$vending_machine = new VendingMachine();
		$vending_machine->take_money($money);

	}

	/**
	 * 払い戻し（ユーザーの操作）
	 *
	 * @return integer|null
	 */
	public function pay_back()
	{
		//VendingMachineのreturn_all_money()を呼び出して、
		$vending_machine = new VendingMachine();
		//下記の関数はVendingmachineクラスで未実装
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