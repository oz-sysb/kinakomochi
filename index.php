<?php
require_once('app/User.php');

$user = new User();
echo $user->get_money();
?>
