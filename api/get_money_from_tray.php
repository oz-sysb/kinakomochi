<?php

require_once('../app/VendingMachine.php');

session_start();

$vending_machine = $_SESSION['vending_machine'];

$amount = $vending_machine->tray->get_amount();
// TODO: 加算じゃなくて減算する
$vending_machine->tray->add_amount(- $amount);

echo $amount;
