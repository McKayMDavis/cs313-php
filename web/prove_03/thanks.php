<?php 
session_start();
$items = $_SESSION['items'];
$prices = $_SESSION['prices'];
?>
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
	<div class="col-sm-4"></div>
	<div class="container-fluid col-sm-4">
		<h3>Order Confirmation</h3>
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
			<h4>Shipping information</h4>
			<?php
			echo "<p>";
			echo htmlspecialchars($_POST['full_name']);
			echo "</p>";
			echo "<p>";
			echo htmlspecialchars($_POST['street1']) . " " . htmlspecialchars($_POST['street2']);
			echo "</p>";
			echo htmlspecialchars($_POST['city']) . ", " . htmlspecialchars($_POST['state']) . " " . htmlspecialchars($_POST['zip']);
			unset($_SESSION['items']);
			unset($_SESSION['prices']);
			unset($_SESSION['cartSize']);
			?>
		</div>
	</div>
</body>
</html>