<?php
$current = basename($_SERVER['PHP_SELF']);

if ($current == "app.php") {
	$viz = 'active';
} elseif ($current == "enter.php") {
	$enter = 'active';
}

echo "<h1 class='heading'>Data Visualization App</h1>";
echo "<nav class='navbar navbar-inverse'>
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
				<li class=$viz><a href='app.php'>Visualize</a></li>
				<li class=$enter><a href='enter.php'>Enter Data</a></li>";
if ($_SESSION["logged_in"]["type"] == 1) {
	echo        "<li class=$enter><a href='register.php'>Register a User</a></li>";
}


echo		"</ul>
			<ul class='nav navbar-nav navbar-right'>";

if ($_SESSION["logged_in"]) {
echo			"<li><a href='logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout</a></li>";
}
echo		"</ul>
		</div>
	</div>
</nav>";
?>