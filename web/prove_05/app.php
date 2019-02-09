<?php
session_start();
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
	<div class="row">
		<div id="nav" class="col-sm-4">
			<form id="data-entry" method="POST">
				Select a Category:
				<br>
				<select name="data-type">
					<option value="goal">Goals</option>
					<option value="total">Totals</option>
					<option value="expense">Expenses</option>
					<option value="revenue">Revenue</option>
				</select>
				<br>
				Select a Year:
				<br>
				<select name="year">
					<?php 
					foreach (range(2012, 2019) as $year) {
						echo "<option value=" . $year . ">" . $year . "</option>";
					}
					?>
				</select>
				<input type="submit" value="Submit">
			</form>
		</div>
		<div id="plot-window" class="col-sm-8">
			<?php
			session_start();
			try
			{
				$dbUrl = getenv('DATABASE_URL');

				$dbOpts = parse_url($dbUrl);

				$dbHost = $dbOpts["host"];
				$dbPort = $dbOpts["port"];
				$dbUser = $dbOpts["user"];
				$dbPassword = $dbOpts["pass"];
				$dbName = ltrim($dbOpts["path"],'/');

				$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

				$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
			catch (PDOException $ex)
			{
				echo 'Error!: ' . $ex->getMessage();
				die();
			}

			$table = 'expense';
			$year = '2018';

			$query = $db->prepare('SELECT * FROM :table WHERE year=:year');
			$query->execute(array(':table' => $table, ':year' => $year));
			$results = $query->fetchAll(PDO::FETCH_ASSOC);

			$_SESSION["query-results"] = $results;

			$data = $_SESSION["query-results"]

			echo $data;
			?>
		</div>
	</div>

	<script type="text/javascript">
		$("#data-entry").submit(function(e) {
			e.preventDefault();
			var formData=$(this).serialize();
			var url="db.php";
			var url2="window.php";
			grabData(formData, url);
		});

		function grabData(formData, pUrl) {
			$.ajax({
				url: url,
				type: 'POST',
				data: formData,
				success: function(response) {
				    $.ajax({
				    	url: url2
				    	type: 'POST'
				    	success: function(response) {
				    		$("#plot-window").html(response);
				    	}
				    })
				}
			});
		}
	</script>
</body>
</html>