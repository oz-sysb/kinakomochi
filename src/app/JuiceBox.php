<?php
/**
 * PHP version 5
 *
 * @category PHP
 * @package  VOID
 * @author   Shunsuke Sakuma <s-sakuma@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */

/**
 * ジュース管理クラス
 *
 * @category PHP
 * @package  VOID
 * @author   Shunsuke Sakuma <s-sakuma@oz-vision.co.jp>
 * @license  BSD Licence
 * @link     http://github.com/oz-sysb/kinakomochi
 */
class JuiceBox
{
    /**
     * ジュース情報
     *
     * @var array
     */
    private $_juice;

    /**
     * コンストラクタ
     */
    public function __construct()
    {
        //ジュースの配列を持っている
        $this->_juice = ['コーラ' => ["price" => 120, "number" => 5]];
    }

    /**
     * ジュースの情報を格納する
     * 現状ではこのメソッド呼ぶと初期状態が破棄されます。
     *
     * @param array $juice ジュース情報
     *
     * @TODO コンストラクタで格納するならこれ要らないのでは。
     *
     * @return void
     */
    public function setJuice($juice)
    {
        $this->_juice = $juice;
    }

    /**
     * ジュースの情報を返す
     *
     * @return array
     */
    public function getJuice()
    {
        return $this->_juice;
    }
}
