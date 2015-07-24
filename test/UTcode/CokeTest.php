<?php
namespace VendingMachineUnitTest;

use VendingMachine\existence\Coke;

class CokeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Coke
     */
    private $coke;

    /**
     * @setup
     */
    public function setUp()
    {
        $this->coke = new Coke();
    }

    /**
     * Unit Test: getName
     *
     * @return void
     *
     * @test
     */
    public function confirmGetName()
    {
        $this->assertequals("コーラ", $this->coke->getName());
    }

    /**
     * Unit Test: getPrice
     *
     * @return void
     *
     * @test
     */
    public function confirmGetPrice()
    {
        $this->assertequals(120, $this->coke->getPrice());
    }

    /**
     * Unit Test: getStockNumber
     *
     * @return void
     *
     * @test
     */
    public function confirmGetStockNumber()
    {
        $this->assertequals(5, $this->coke->getStockNumber());
    }
}
