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
 * お金関係クラス
 *
 * @category PHP
 * @package  VOID
 * @author   Shunsuke Sakuma <s-sakuma@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
class MoneyBox
{
    /**
     * 総計金額
     *
     * @var integer
     */
    private $_total;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->clearTotal();
    }

    /**
     * 投入金額を加算する
     *
     * @param integer $amount 投入金額
     *
     * @return integer
     */
    public function addTotal($amount)
    {
        $this->_total += $amount;

        return $this->_total;
    }

    /**
     * 投入された金額の総計を返す
     *
     * @return integer
     */
    public function getTotal()
    {
        return $this->_total;
    }

    /**
     * Totalを初期化する
     *
     * @return integer
     */
    public function clearTotal()
    {
        $this->_total = 0;

        return $this->_total;
    }
}
