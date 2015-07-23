<?php
namespace VendingMachine;

class MoneyCheck
{
    /**
     * 扱えるお金
     *
     * @var array
     */
    private static $_valid_money = [10, 50, 100, 500, 1000];

    /**
     * 扱えるお金かを確認する
     *
     * @param integer $amount 金額
     *
     * @return boolean 扱えるお金かどうか
     */
    public function validateMoney($amount)
    {
        return in_array($amount, self::$_valid_money, true);
    }
}
