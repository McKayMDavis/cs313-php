<?php
session_start();
$current = basename($_SERVER['PHP_SELF']);

if (!isset($_SESSION['cartSize'])) {
	$cartSize = 0;
} else {
	$cartSize = $_SESSION['cartSize'];
}

if ($current == "items.php") {
	$items = 'active';
} elseif ($current == "view_cart.php") {
	$cart = 'active';
} elseif ($current == "checkout.php") {
	$checkout = 'active';
}

echo "
<header><h1>Shopping</h1></header>
<nav class='navbar navbar-inverse'>
	<div class='container-fluid'>
		<div class='navbar-header'>
			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span> 
			</button>
		</div>
		<div class='collapse navbar-collapse' id='myNavbar'>
			<ul class='nav navbar-nav'>
				<li class=$items><a href='./items.php'>All Items</a></li>
			</ul>
			<ul class='nav navbar-nav navbar-right'>
				<li class=$cart><a href='./view_cart.php'><span class='glyphicon glyphicon-shopping-cart'></span> $cartSize</a></li>
				<li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>";
?>