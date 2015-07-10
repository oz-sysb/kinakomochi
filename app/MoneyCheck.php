<?php
class MoneyCheck
{
	/**
	 * 許可されている金額
	 */
	private static $_valid_moneys = array(10, 50, 100, 500, 1000);

	/**
	 * 許可されている金額かを確認する
	 *
	 * @param integer $amount 投入金額
	 *
	 * @return boolean
	 */
	public function is_valid_money($amount)
	{
		return in_array($amount, self::$_valid_moneys, true);
	}
}
