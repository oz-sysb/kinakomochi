<?php
namespace VendingMachine\existence;

interface DrinkInterface
{
    /**
     * 名前の取得
     *
     * @return string
     */
    public function getName();

    /**
     * 値段の取得
     *
     * @return integer
     */
    public function getPrice();
}
