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
   *
   * @return boolean 投入に成功したか否か
   */
  public function add_amount($amount)
  {
    if(intval($amount))
    {
      $this->_amount += $amount;
      return true;
    }
    return false;
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
