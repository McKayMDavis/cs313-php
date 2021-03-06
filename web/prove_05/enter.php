<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
	flush();
	header("Location: login.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Data Entry</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
	<?php require("header.php")?>
	<div class="container-fluid">
		<div class="row">
			<div id="nav" class="col-sm-3 navigator" autocomplete="off">
				<form id="data-entry" action="construct_input.php" method="POST">
					<div class="form-group">
						<label for="data-type">Category:</label>
						<select name="data-type" class="form-control">
							<!-- <option value="goal">Goals</option> -->
							<option value="expense">Expenses</option>
							<option value="revenue">Revenue</option>
						</select>
					</div>
					<div class="form-group">
						<label for="nrow">How Many Rows?</label>
						<input type="text" name="nrow" maxlength="3" class="form-control" autocomplete="off">
					</div>
					<input type="submit" value="Enter Data">
				</form>
			</div>
			<div id="plot-window" class="col-sm-8">
				<?php
				if (isset($_GET["success"]) && $_GET["success"]=="F") {
					echo "<h4 class='text-center' style='color:darkred'>Something went wrong. Please try again.</h4>";
				} elseif (isset($_GET["success"]) && $_GET["success"]=="T") {
					echo "<h4 class='text-center' style='color:darkgreen'>Data entry successful.</h4>";
				}
				?>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		var frm = $('#data-entry');

	    frm.submit(function (e) {

	        e.preventDefault();

	        $.ajax({
	            type: frm.attr('method'),
	            url: frm.attr('action'),
	            data: frm.serialize(),
	            success: function (data) {
	            	console.log("Success 1")

	                $.ajax({
				    	url: 'window2.php',
				    	success: function(response) {
				    		console.log("Success 2");
				    		$("#plot-window").html(response);
				    	}
				    });

	            },
	            error: function (data) {
	                console.log('An error occurred.');
	                console.log(data);
	            },
	        });
	    });
	</script>
</body>
</html>