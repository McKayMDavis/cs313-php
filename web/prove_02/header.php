<?php
$current = basename($_SERVER['PHP_SELF']);

echo "
<header>
		<h1>Homepage</h1>
</header>
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
			<ul class='nav navbar-nav'>";

if ($current == "home.php") {
	echo "		<li class='active'><a href='./home.php'>Home</a></li>
				<li><a href='./assignments.php'>Assignments</a></li>";
} elseif ($current == "assignments.php") {
	echo "		<li><a href='./home.php'>Home</a></li>
				<li class='active'><a href='./assignments.php'>Assignments</a></li>";
}

echo "		</ul>
			<ul class='nav navbar-nav navbar-right'>
				<li><a href='#'><span class='glyphicon glyphicon-user'></span> Sign Up</a></li>
				<li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>";
?>