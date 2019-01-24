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
	<div id="nav">
		<?php
		require('./header.php');
		?>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2">
				<button class="add">Item1</button>
			</div>
			<div class="col-sm-2">
				<button class="add">Item2</button>
			</div>
			<div class="col-sm-2">
				<button class="add">Item3</button>
			</div>
			<div class="col-sm-2">
				<button class="add">Item4</button>
			</div>
			<div class="col-sm-2">
				<button class="add">Item5</button>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		//call function on class 'add' button click to add stuff to the cart
		$(function(){
			$('.add').click(function (event) {
				$.post( "./add_item.php", { item: this.innerHTML }, function( data ) {
					console.log( data.item );
					console.log( data.success );
					console.log( data.cartSize );
					if (data.success == "true") {
						alert("Successfully added " + data.item + " to cart!")
						//reload the header.... There is an error where php no longer knows what page we are on. We could probably use sessions to store the current page.
						$.ajax({ url: 'header.php',
						         success: function(output) {
						                     $('#nav').html(output);
						                  }
						});
					} else {
						alert("Something went wrong. Please try again.")
					}
				}, "json");
			});
		});
	</script>
</body>
</html>