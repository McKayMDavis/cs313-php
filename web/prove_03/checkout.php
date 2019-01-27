<?php 
session_start();
$items = $_SESSION['items'];
$prices = $_SESSION['prices'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<title>Checkout</title>
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
	<div class="col-sm-4"></div>
	<div class="container-fluid col-sm-4">
		<h3>Checkout</h3>
		<div>
			<table class="table-responsive, table-hover" style="width: 100%">
				<?php
				if (sizeof($items) > 0) {
					echo "
					<thead>
						<tr>
							<th>Item</th>
							<th>Price</th>
						</tr>
					</thead>";
				}
				?>
				<tbody>
					<?php
					foreach ($items as $key=>$i) {
						echo "
						<tr>
							<td>$i</td>
							<td>\$$prices[$key]</td>
						</tr>";
					}
					?>
				</tbody>
			</table>
			<!--form from w3schools-->
			<form action="./thanks.php" method="post">
				<div class="form-group"> <!-- Full Name -->
					<label for="full_name_id" class="control-label">Full Name</label>
					<input required="required" type="text" class="form-control" id="full_name_id" name="full_name" placeholder="B.B. King">
				</div>	

				<div class="form-group"> <!-- Street 1 -->
					<label for="street1_id" class="control-label">Street Address 1</label>
					<input required="required" type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o">
				</div>					
										
				<div class="form-group"> <!-- Street 2 -->
					<label for="street2_id" class="control-label">Street Address 2</label>
					<input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
				</div>	

				<div class="form-group"> <!-- City-->
					<label for="city_id" class="control-label">City</label>
					<input required="required" type="text" class="form-control" id="city_id" name="city" placeholder="City">
				</div>									
										
				<div class="form-group"> <!-- State Button -->
					<label for="state_id" class="control-label">State</label>
					<select class="form-control" id="state_id" name="state">
						<option value="AL" selected="selected">Alabama</option>
						<option value="AK">Alaska</option>
						<option value="AZ">Arizona</option>
						<option value="AR">Arkansas</option>
						<option value="CA">California</option>
						<option value="CO">Colorado</option>
						<option value="CT">Connecticut</option>
						<option value="DE">Delaware</option>
						<option value="DC">District Of Columbia</option>
						<option value="FL">Florida</option>
						<option value="GA">Georgia</option>
						<option value="HI">Hawaii</option>
						<option value="ID">Idaho</option>
						<option value="IL">Illinois</option>
						<option value="IN">Indiana</option>
						<option value="IA">Iowa</option>
						<option value="KS">Kansas</option>
						<option value="KY">Kentucky</option>
						<option value="LA">Louisiana</option>
						<option value="ME">Maine</option>
						<option value="MD">Maryland</option>
						<option value="MA">Massachusetts</option>
						<option value="MI">Michigan</option>
						<option value="MN">Minnesota</option>
						<option value="MS">Mississippi</option>
						<option value="MO">Missouri</option>
						<option value="MT">Montana</option>
						<option value="NE">Nebraska</option>
						<option value="NV">Nevada</option>
						<option value="NH">New Hampshire</option>
						<option value="NJ">New Jersey</option>
						<option value="NM">New Mexico</option>
						<option value="NY">New York</option>
						<option value="NC">North Carolina</option>
						<option value="ND">North Dakota</option>
						<option value="OH">Ohio</option>
						<option value="OK">Oklahoma</option>
						<option value="OR">Oregon</option>
						<option value="PA">Pennsylvania</option>
						<option value="RI">Rhode Island</option>
						<option value="SC">South Carolina</option>
						<option value="SD">South Dakota</option>
						<option value="TN">Tennessee</option>
						<option value="TX">Texas</option>
						<option value="UT">Utah</option>
						<option value="VT">Vermont</option>
						<option value="VA">Virginia</option>
						<option value="WA">Washington</option>
						<option value="WV">West Virginia</option>
						<option value="WI">Wisconsin</option>
						<option value="WY">Wyoming</option>
					</select>					
				</div>
				
				<div class="form-group"> <!-- Zip Code-->
					<label for="zip_id" class="control-label">Zip Code</label>
					<input required="required" type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
				</div>

				<div class="form-group"> <!-- Submit Button -->
					<button type="submit" class="btn btn-primary">Buy!</button>
				</div> 
			</form>
			<br>
			<a href="./view_cart.php">Return to Cart</a>
		</div>
	</div>
</body>
</html>