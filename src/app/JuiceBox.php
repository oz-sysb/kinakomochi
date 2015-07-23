<?php
namespace VendingMachine;

class JuiceBox
{
    /**
     * ジュース情報
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
