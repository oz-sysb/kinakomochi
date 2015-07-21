<?php
class MoneyCheck
{
	/**
	 * 扱えるお金
	 */
	private static $_valid_money = [10, 50, 100, 500, 1000];

	/**
	 * 扱えるお金かを確認する
	 *
	 * @param integer $amount 金額
	 *
	 * @return boolean 扱えるお金かどうか
	 */
	public function validate_money($amount)
	{
		return in_array($amount, self::$_valid_money, true);
	}
}
