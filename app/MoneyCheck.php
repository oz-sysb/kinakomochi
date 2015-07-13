<?php
class MoneyCheck
{
	/**
	 * 許可されている金額
	 */
	private static $_valid_money = array(10, 50, 100, 500, 1000);

	/**
	 * 許可されている金額かを確認する
	 *
	 * @param integer $amount 金額
	 *
	 * @return boolean
	 */
	public function validate_money($amount)
	{
		return in_array($amount, self::$_valid_money, true);
	}
}
