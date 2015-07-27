<?php
namespace VendingMachine;

use VendingMachine\existence\Coke;

class JuiceBox
{
    /**
     * ジュース情報
     *
     * @var array
     */
    private $juice;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        //ジュースの配列を持っている
        //$this->cokes = [new Coke("コーラ", 120)] ;
        $this->juice = new Coke() ;
    }

    /**
     * 購入できるジュースの名前を返却する
     *
     * @param integer $amount 投入金額の総計
     *
     * @return string
     */
    public function buyableJuice($amount)
    {
        if($amount >= $this->juice->getPrice())
        {
            return $this->juice->getName();
        }
        //在庫のじゅーすがある
        //$amountで返るじゅーすがあるかJuice_objから判断する
        //買えるものがなければvoidを返却する
        return;
    }

    public function buy($name)
    {
        //$nameが管理している在庫のものだと確認（ここではコーラ）
        //$nameのものの在庫を正しく減らす必要がある
        $this->juice->computeStock(-1);
        return $this->juice;
    }
}
