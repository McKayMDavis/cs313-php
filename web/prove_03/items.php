<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Browse Items</title>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  	<link rel="stylesheet" type="text/css" href="custom.css">
</head>
<body>
	<header><h1>Shopping</h1></header>
	<?php
	require('./header.php');
	?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
				<button id="add">Item1</button>
			</div>
			<div class="col-sm-2">
				<button id="add">Item2</button>
			</div>
			<div class="col-sm-2">
				<button id="add">Item3</button>
			</div>
			<div class="col-sm-2">
				<button id="add">Item4</button>
			</div>
			<div class="col-sm-2">
				<button id="add">Item5</button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		$(function(){
			$('#add').click(function (event) {
				$.post( "add_item.php", { item: this.innerhtml }, function( data ) {
					console.log( data.item );
					console.log( data.success );
					console.log( data.cartSize );
				}, "json");
			});
		});
	</script>
</body>
</html>