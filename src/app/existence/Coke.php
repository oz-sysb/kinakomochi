<?php

namespace VendingMachine\existence;

use VendingMachine\existence;

class Coke implements DrinkInterface
{
    private $name;
    private $price;
    private $number;

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
