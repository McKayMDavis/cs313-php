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
			<div class="col-sm-3">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" name="item">Item 1</h5>
						<h3 class="card-title" name="price">100</h3>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<button class="add">Add to Cart</button>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" name="item">Item 2</h5>
						<h3 class="card-title" name="price">200</h3>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<button class="add">Add to Cart</button>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" name="item">Item 3</h5>
						<h3 class="card-title" name="price">300</h3>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<button class="add">Add to Cart</button>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" name="item">Item 4</h5>
						<h3 class="card-title" name="price">400</h3>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<button class="add">Add to Cart</button>
					</div>
				</div>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-3">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" name="item">Item 5</h5>
						<h3 class="card-title" name="price">500</h3>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<button class="add">Add to Cart</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		//call function on class 'add' button click to add stuff to the cart
		$(function(){
			$('.add').click(function (event) {
				thiz = this;
				$.post( "./add_item.php", { item: $('thiz').siblings('[name="item"]').innerHTML, price: $('thiz').siblings('[name="price"]').innerHTML }, function( data ) {
					console.log( data.item );
					console.log( data.success );
					console.log( data.cartSize );
					if (data.success == "true") {
						alert("Successfully added " + data.item + " to cart!")
						//Could just change this to location.reload();
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