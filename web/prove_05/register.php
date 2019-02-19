<?php
session_start();
if ($_SESSION["logged_in"] != 1) {
	flush();
	header("Location: login.php");
	die();
}
?>
<!DOCTYPE html>
<html>
<html lang="en">
<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
	<?php require("header.php")?>
	<div class="row">
		<div class="container-fluid">
			<h2 class="text-center">Register a New User:</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<form id="login" action="register_db.php" method="POST">
				<div class="form-group">
					<label for="username">Username:</label>
					<input type="text" class="form-control" id="username" placeholder="Enter username" name="username" autocomplete="off" required="required">
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<input type="password" class="form-control" id="password" placeholder="Enter password" name="password" required="required">
				</div>
				<div class="form-group">
					<label for="password-conf">Re-Enter Password:</label>
					<input type="password" class="form-control" id="password-conf" placeholder="Enter password" name="password-conf" required="required">
				</div>
				<input type="submit" value="Register">
			</form>
		</div>
		<div class="col-sm-4"></div>
	</div>
	<script type="text/javascript">
		var password = document.getElementById("password")
		, confirm_password = document.getElementById("password-conf");

		function validatePassword(){
			if(password.value != confirm_password.value) {
				confirm_password.setCustomValidity("Passwords Don't Match");
			} else {
				confirm_password.setCustomValidity('');
			}
		}

		password.onchange = validatePassword;
		confirm_password.onkeyup = validatePassword;
	</script>
</body>
</html>