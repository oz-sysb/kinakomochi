<?php

require_once('../app/VendingMachine.php');

session_start();

$amount = $_GET['amount'];
$vending_machine = $_SESSION['vending_machine'];

echo $vending_machine->take_money(intval($amount));
