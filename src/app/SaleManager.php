<?php
namespace VendingMachine;

class SaleManager
{
    /**
     * コンストラクタ
     */
    public function __construct()
    {
    }

    /**
     * 購入できるジュースの名前を返却する
     *
     * @param integer $amount 投入金額の総計
     *
     * @return string
     */
    public function buyAbleJuice($amount)
    {

        //在庫のじゅーすがある
        //$amountで返るじゅーすがあるかJuice_objから判断する
        //買えるものがなければvoidを返却する
        return 'hoge';
    }
}
