<?php
namespace VendingMachine;

class Stock
{
    /**
     * 在庫リスト
     *
     * @var array
     */
    private $stockList;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->stockList = [];
    }

    /**
     * 在庫を変更する
     *
     * @param string $name   名前
     * @param int    $amount 追加する本数(負の値の場合在庫を減らす)
     * @fixme 管理対象はジュースオブジェクトにしたいなあ
     *
     * @return array 在庫リスト
     */
    public function modStock($name, $amount)
    {
        if (isset($this->stockList[$name])) {
            $this->stockList[$name] += $amount;
        }
        else {
            $this->stockList[$name] = $amount;
        }
        return $this->stockList;
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
        if (isset($this->stockList[$name])) {
            return $this->stockList[$name];
        }
        return 0;
    }
}
