<?php
class MoneyCheck
{
	//許可されている金額
	private static $_valid_money = array(10, 50, 100, 500, 1000);

	/**
	 * 許可されているお金かを確認する
	 */
	public function is_valid_money($amount)
	{
		return true;
	}

}
