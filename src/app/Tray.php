<?php
namespace VendingMachine;

class Tray
{

    /**
     * 釣り銭トレイ内金額の合計
     */
    private $_amount;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->_amount = 0;
    }

    /**
     * 釣り銭トレイ内金額の合計への加算
     *
     * 指定された金額を加算する
     * 指定された金額がintでない場合は加算しない
     *
     * @param integer $amount 金額
     *
     * @return boolean 加算できたか否か
     */
    public function computeAmount($amount)
    {
        if (is_int($amount)) {
            $this->_amount += $amount;

            return true;
        }

        return false;
    }

    /**
     * 釣り銭トレイ内金額の合計取得
     *
     * @return integer 釣り銭トレイ内金額の合計
     */
    public function getAmount()
    {
        return $this->_amount;
    }
}