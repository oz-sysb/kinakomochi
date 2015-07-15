<?php

require_once('app/VendingMachine.php');

session_start();

$_SESSION['vending_machine'] = new VendingMachine();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>きなこもち</title>
	<script type="text/javascript" src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
	<ul>
		<li>
			<select id="money-amount">
				<option value="1">1</option>
				<option value="5">5</option>
				<option value="10">10</option>
				<option value="50">50</option>
				<option value="100">100</option>
				<option value="500">500</option>
				<option value="1000">1000</option>
				<option value="5000">5000</option>
				<option value="10000">10000</option>
			</select>円
			<button id="put-money-button">お金を入れる</button>
		</li>
		<li>
			<button id="pay-back-button">払い戻す</button>
		</li>
		<li>
			<button id="tray-button">トレイからとる</button>
		</li>
	</ul>
	レスポンス表示ボックス<br>
	amount: <input type="text" id="amount"><br>
	tray: <input type="text" id="tray"><br>
	<script>
		$(function() {
			$('#put-money-button').on('click', function() {
				$.ajax('api/put_money.php', {
					type: 'POST',
					data: {
						amount: $('#money-amount').val()
					}
				}).done(function(res) {
					$('#amount').val(res);
				});
			});

			$('#pay-back-button').on('click', function() {
				$.ajax('api/pay_back.php', {
					type: 'GET'
				});
			});

			$('#tray-button').on('click', function() {
				$.ajax('api/get_money_from_tray.php', {
					type: 'GET'
				}).done(function(res) {
					$('#tray').val(res);
				});
			});
		});
	</script>
</body>
</html>