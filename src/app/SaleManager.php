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
     * コンストラクタ
     */
    public function __construct()
    {
        $this->juices = [
            new Coke()
        ];
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
        foreach ($this->juices as $juice)
        {
            if ($juice->getPrice() <= $amount)
            {
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
        if ($juice)
        {
            $juice->computeStock(-1);
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
        foreach ($this->juices as $juice)
        {
            if ($juice->getName() == $name)
            {
                return $juice;
            }
        }
        return;
    }
}
