<?php
require_once 'User.php';
class UserTest extends PHPUnit_Framework_TestCase
{
        protected $object;
        public function setUp()
        {
                $this->object = new User;
        }

        public function test_put_moneyを呼ぶ()
        {
                echo __DIR__;
                $this->object->put_money(10);
        }

        public function test_get_moneyを呼ぶ()
        {
                $this->object->get_money();
        }
}