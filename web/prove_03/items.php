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
						<h5 class="card-title" class="item">Item1</h5>
						<h3 class="card-title" class="price">100</h3>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<button class="add">Add to Cart</button>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" class="item">Item2</h5>
						<h3 class="card-title" class="price">200</h3>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<button class="add">Add to Cart</button>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" class="item">Item3</h5>
						<h3 class="card-title" class="price">300</h3>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<button class="add">Add to Cart</button>
					</div>
				</div>
			</div>
			<div class="col-sm-3">
				<div class="card" style="width: 18rem;">
					<img class="card-img-top" src="..." alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title" class="item">Item4</h5>
						<h3 class="card-title" class="price">400</h3>
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
						<h5 class="card-title" class="item">Item5</h5>
						<h3 class="card-title" class="price">500</h3>
						<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
						<button class="add">Add to Cart</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		//call function on class 'add' button click to add stuff to the cart
		$().ready(function(){
		    $(".add").click(function() {
		        var button = this;
		        $.ajax({
		            url:  '{site_url}index.php/activate',
		            type: 'POST', 
		            dataType: 'html',
		            data: {
		                item: $(button).siblings('.item').text(),
		                idclient: $(button).siblings('.price').text(),
		            },
		            success: function(result) {
		            	console.log(result.item);
		            }
		        });
		    });
		});
	</script>
</body>
</html>