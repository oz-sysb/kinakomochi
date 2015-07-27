<?php
namespace VendingMachine\existence;

class Coke implements DrinkInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $price;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        $this->name = "コーラ";
        $this->price = 120;
    }

    /**
     * 商品名返す
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * 価格を返す
     *
     * @return integer
     */
    public function getPrice()
    {
        return $this->price;
    }
}
