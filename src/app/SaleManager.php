<?php
namespace VendingMachine;

//require_once 'MoneyBox.php';
//require_once 'Tray.php';
//require_once 'MoneyCheck.php';

/**
 * 購入管理クラス
 *
 * @category PHP
 * @package  VOID
 * @author   Shunsuke Sakuma <s-sakuma@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
class SaleManager
{

    /**
     * コンストラクタ
     */
    public function __construct()
    {
    }

    public function checkBought($amount)
    {
        //在庫のじゅーすがある
        //$amountで返るじゅーすがあるかJuice_objから判断する
        //買えるものがなければvoidを返却する
        return 'hoge';
    }
}
