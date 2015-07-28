<?php
namespace VendingMachine;

class MoneyBox
{
    /**
     * 総計金額
     *
     * @var integer
     */
    private $total;

    /**
     * 売上金額
     *
     * @var integer
     */
    private $salesproceeds;
    /**
     * 投入金額を加算する
     *
     * @param integer $amount 投入金額
     *
     * @return integer
     */
    public function addTotal($amount)
    {
        $this->total += $amount;
        return $this->total;
    }

    /**
     * 投入された金額の総計を返す
     *
     * @return integer
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Totalを初期化する
     *
     * @return integer
     */
    public function clearTotal()
    {
        $this->total = 0;

        return $this->total;
    }

    /**
     * 売上金額を加算する
     *
     * @param integer $amount 売上金額
     *
     * @return integer
     */
    public function salesProceeds($amount)
    {
        $this->salesproceeds += $amount;
        return $this->salesproceeds;
    }
}
