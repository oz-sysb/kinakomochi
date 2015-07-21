<?php
/**
 * PHP version 5
 *
 * @category PHP
 * @package  VOID
 * @author   Shunsuke Sakuma <s-sakuma@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */

/**
 * お金管理クラス
 *
 * @category PHP
 * @package  VOID
 * @author   Shunsuke Sakuma <s-sakuma@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
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
    public function validateMoney($amount)
    {
        return in_array($amount, self::$_valid_money, true);
    }
}
