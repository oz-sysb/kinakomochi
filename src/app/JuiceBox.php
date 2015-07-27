<?php
namespace VendingMachine;

use VendingMachine\existence\Coke;
use VendingMachine\existence\DrinkInterface;

class JuiceBox
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
        foreach($this->juices as $juice)
        {
            if ($juice->getPrice() <= $amount)
            {
                $buyableJuiceNames[] = $juice->getName();
            }
        }
        return $buyableJuiceNames;
    }

    public function buy($name)
    {
        //$nameが管理している在庫のものだと確認（ここではコーラ）
        //$nameのものの在庫を正しく減らす必要がある
        $this->juices[0]->computeStock(-1);

        return $this->juices[0];
    }

    public function getJuice()
    {
        return $this->juices[0];
    }

    public function setJuice($juice)
    {
        return $this->juices[0] = $juice;
    }
}
