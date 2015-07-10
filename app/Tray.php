<?php
class Tray
{
  /**
   * 数
   */
  private $_amount;

  public function __construct()
  {
    $this->_amount = 0;
  }

  /**
   * 加算する
   *
   * @param integer $amount 数
   * @return none
   */
  public function add_amount($amount)
  {
    $this->_amount += $amount;
  }

  /**
   * 取得する
   *
   * @return integer
   */
  public function get_amount()
  {
    return $this->_amount;
  }
}
