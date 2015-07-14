<?php

require_once('../app/VendingMachine.php');

session_start();

$vending_machine = $_SESSION['vending_machine'];

echo $vending_machine->pay_back();
