<?php
namespace VendingMachine;

use VendingMachine\existence\Coke;
use VendingMachine\existence\RedBull;
use VendingMachine\existence\Water;
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

        $this->juices = [
            $coke = new Coke(),
            $redBull = new RedBull(),
            $water = new Water(),
        ];
        $this->stock->modStock($coke->getName(), 5);
        $this->stock->modStock($redBull->getName(), 5);
        $this->stock->modStock($water->getName(), 5);
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
            if ($juice->getPrice() > $amount) {
                continue;
            }
            if ($this->getStockNumber($juice->getName()) <= 0) {
                continue;
            }
            array_push($buyableJuiceNames, $juice->getName());
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
            $this->stock->modStock($juice->getName(), -1);
        }
        return $juice;
    }

    /**
     * ジュースを取得する
     *
     * @param string $name ジュースの名前
     *
     * @return Juice|null
     */
    public function getJuice($name)
    {
        foreach ($this->juices as $juice) {
            if ($juice->getName() == $name) {
                return $juice;
            }
        }
        return null;
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
        if (is_null($juice)) {
            return 0;
        }

        return $this->stock->getAmount($juice->getName());
    }
}
