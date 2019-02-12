<?php
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
				<li class=$items><a href='app.php'>Visualize</a></li>
				<li class=$items><a href='enter.php'>Enter Data</a></li>
			</ul>
			<ul class='nav navbar-nav navbar-right'>
				<li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Login</a></li>
			</ul>
		</div>
	</div>
</nav>";
?>