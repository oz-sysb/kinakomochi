<?php
namespace VendingMachine;

use VendingMachine\existence\Coke;
use VendingMachine\existence\DrinkInterface;

class SaleManager
{
    /**
     * ジュース情報
     *
     * @var DrinkInterface
     */
    private $juices;

    /**
     * @var Stock
     */
    private $stock;


    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->stock = new Stock();

        $coke = new Coke();
        $this->juices = [
            $coke
        ];
        $this->stock->addItem($coke->getName(), 5);
    }

    /**
     * 購入できるジュースの名前を返却する
     *
     * @param integer $amount 投入金額の総計
     *
     * @return array
     */
    public function buyableJuice($amount)
    {
        $buyableJuiceNames = [];
        foreach ($this->juices as $juice) {
            if ($juice->getPrice() <= $amount) {
                $buyableJuiceNames[] = $juice->getName();
            }
        }
        return $buyableJuiceNames;
    }

    /**
     * ジュースの名前を受け取り、そのジュースの在庫を1減らす
     *
     * @param string $name ジュース名
     *
     * @return Juice|void
     */
    public function buy($name)
    {
        $juice = $this->getJuice($name);
        if ($juice) {
            $this->stock->addAmount($juice->getName(), -1);
        }
        return $juice;
    }

    /**
     * ジュースを取得する
     *
     * @param string $name ジュースの名前
     *
     * @return Juice|void
     */
    public function getJuice($name)
    {
        foreach ($this->juices as $juice) {
            if ($juice->getName() == $name) {
                return $juice;
            }
        }
        return;
    }

    /**
     * 在庫数を取得する
     *
     * @param string $name 名前
     *
     * @return int
     */
    public function getStockNumber($name)
    {
        $juice = $this->getJuice($name);

        return $this->stock->getAmount($juice->getName());
    }
}
