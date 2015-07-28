<?php
namespace VendingMachine;

class Stock
{
    /**
     * @var array
     */
    private $amounts;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->amounts = [];
    }

    /**
     * 管理する商品を追加する
     *
     * @param string $name 名前
     * @param int $amount 在庫数
     *
     * @return void
     */
    public function addItem($name, $amount)
    {
        $this->amounts[$name] = $amount;
    }

    /**
     * 在庫数を増やす
     *
     * @param string
     * @param int $amount 追加する数
     *
     * @return int
     *
     * @FIXME メソッド名を適切なものに変えたい
     */
    public function addAmount($name, $amount)
    {
        return $this->amounts[$name] += $amount;
    }

    /**
     * 在庫数を取得する
     *
     * @param string $name 名前
     *
     * @return int
     */
    public function getAmount($name)
    {
        return $this->amounts[$name];
    }
}
