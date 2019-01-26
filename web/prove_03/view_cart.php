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
		<h3>Cart</h3>
		<div id="cart">
			<?php require './cart_contents.php'?>
		</div>
		<a href="./checkout.php">Checkout</a>
	</div>
	<script type="text/javascript">
		$(function(){
			$('.remove').click(function (event) {
				$.post( "./add_item.php", { item: this.innerHTML }, function( data ) {
					console.log( data.item );
					console.log( data.success );
					console.log( data.cartSize );
					if (data.success == "true") {
						alert("Successfully removed " + data.item + " from cart!")
						$.ajax({ url: 'header.php',
						         success: function(output) {
						                     $('#nav').html(output);
						                  }
						});
						$.ajax({ url: 'view_cart.php'});						
					} else {
						alert("Something went wrong. Please try again.")
					}
				}, "json");
			});
		});
	</script>
</body>
</html>