<?php
namespace VendingMachine;

class VendingMachine
{
    /**
     * お金管理
     *
     * @var MoneyBox
     */
    private $moneyBox;

    /**
     * 釣り銭トレイ
     *
     * @var Tray
     */
    public $tray;

    /**
     * ジュースボックス
     *
     * @var SaleManager
     */
    public $saleManager;
    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->moneyBox = new MoneyBox();
        $this->tray = new Tray();
        $this->saleManager = new SaleManager();
        $this->buyableJuice();
    }

    /**
     * 投入金額を受け取る
     *
     * 扱えるお金の場合  ：投入金額の総計を加算する
     * 扱えないお金の場合：釣り銭トレイに返却する
     *
     * @param integer $amount 投入金額
     *
     * @return integer 投入金額の総計
     */
    public function takeMoney($amount = null)
    {
        $money_check = new MoneyCheck();
        if ($money_check->validateMoney($amount)) {
            return ($this->moneyBox->addTotal($amount));
        }
        $this->tray->computeAmount($amount);

        return $this->moneyBox->getTotal();
    }

    /**
     * 払い戻し
     *
     * 投入金額の総計を全額釣り銭トレイに返却する
     *
     * @return integer 投入金額の総計 (0しかない想定)
     */
    public function payBack()
    {
        $this->tray->computeAmount($this->moneyBox->getTotal());
        $this->moneyBox->clearTotal();

        return $this->tray->getAmount();
    }

    /**
     * 総計金額より購入できるジュースがあるか確認する
     *
     * @return array
     */
    public function buyableJuice()
    {
        return $this->saleManager->buyableJuice($this->moneyBox->getTotal());
    }

    /**
     * ジュースの名前を受け取り、そのジュースの在庫を1減らす
     *
     * @param string $name ジュースの名前
     *
     * @return null|Juice
     */
    public function buyJuice($name)
    {
        $buyableJuices = $this->buyableJuice();
        if (! in_array($name, $buyableJuices)) {
            return null;
        }
        $juice = $this->saleManager->buy($name);
        $this->moneyBox->addTotal(-$juice->getPrice());
        return $juice;

    }

    /**
     * 総計金額を取得する
     *
     * @return integer
     */
    public function getTotal()
    {
        return $this->moneyBox->getTotal();
    }
}
