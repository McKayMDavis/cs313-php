<?php
session_start();
if (!isset($_SESSION["logged_in"])) {
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
	<div class="container-fluid">
		<div class="row">
			<div id="nav" class="col-sm-3 navigator">
				<form id="data-entry" action="select.php" method="POST">
					<div class="form-group">
						<label for="data-type">Category:</label>
						<select name="data-type" class="form-control">
							<!--<option value="goal">Goals</option>-->
							<option value="expense">Expenses</option>
							<option value="revenue">Revenue</option>
						</select>
					</div>
					<div class="form-group">
						<label for="year">Year:</label>
						<select name="year" class="form-control">
							<?php 
							foreach (range(2012, 2019) as $year) {
								echo "<option value=" . $year . ">" . $year . "</option>";
							}
							?>
						</select>
					</div>
					<input type="submit" value="View">
				</form>
			</div>
			<div class="col-sm-8">
				<div id="loader" class="loader"></div>
				<div id="plot-window"></div>
			</div>

		</div>
	</div>

	<script type="text/javascript">
		var frm = $('#data-entry');

	    frm.submit(function (e) {

	        e.preventDefault();
	        $('#loader').show();
	        $('#plot-window').css({ opacity: 0.6 });

	        $.ajax({
	            type: frm.attr('method'),
	            url: frm.attr('action'),
	            data: frm.serialize(),
	            success: function (data) {
	            	console.log("Success 1")

	                $.ajax({
				    	url: 'window.php',
				    	success: function(response) {
				    		console.log("Success 2");
				    		$('#loader').hide();
				    		$('#plot-window').css({ opacity: 1 });
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