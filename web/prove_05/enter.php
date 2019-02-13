<?php
session_start();
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
			<div id="nav" class="col-sm-3 navigator">
				<form id="data-entry" action="construct_input.php" method="POST">
					Select a Category:
					<br>
					<select name="data-type">
						<!-- <option value="goal">Goals</option> -->
						<option value="expense">Expenses</option>
						<option value="revenue">Revenue</option>
					</select>
					<br>
					How Many Rows?
					<br>
					<input type="text" name="nrow" maxlength="3">
					<br>
					<input type="submit" value="Submit">
				</form>
			</div>
			<div id="plot-window" class="col-sm-8">
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