<?php
namespace VendingMachine\existence;
class Coke implements DrinkInterface
{
    private $name;
    private $price;
    private $count;

		/**
		 * コンストラクタ
		 */
    public function __construct()
    {
        $this->name = "コーラ";
        $this->price = 120;
        $this->number = 5;
    }

		/**
		 * 商品名返す
		 * @return string
		 */
    public function getName()
    {
        return $this->name;
    }
}
