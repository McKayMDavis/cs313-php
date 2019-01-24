<?php
$current = basename($_SERVER['PHP_SELF']);

if ($current == "items.php") {
	$items = 'active';
} elseif ($current == "view_cart.php") {
	$cart = 'active';
} elseif ($current == "checkout.php") {
	$checkout = 'active';
}

echo "
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
				<li class=$items><a href='./items.php'>Browse</a></li>
				<li class=$cart><a href='./view_cart.php'>View Cart</a></li>
				<li class=$checkout><a href='./checkout.php'>Checkout</a></li>
			</ul>
			<ul class='nav navbar-nav navbar-right'>
				<li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Up for Lessons</a></li>
				<li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>";
?>