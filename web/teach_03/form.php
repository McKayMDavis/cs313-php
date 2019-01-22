<!DOCTYPE html>
<html>
<head>
	<title>bob</title>
</head>
<body>
	<?php
	$majors = array("CS"=>"Computer Science",
					"WDD"=>"Web Design and Development",
					"CIT"=>"Computer Information Technology",
					"CE"=>"Computer Engineering");
	$continents = array("na"=>"North America",
						"sa"=>"South America",
						"eu"=>"Europe",
						"a"=>"Asia",
						"au"=>"Australia",
						"af"=>"Africa",
						"ant"=>"Antarctica");
	?>
	<form action="results.php" method="post">
		Name
		<br>
		<input type="text" name="name">
		<br>
		Email
		<br>
		<input type="text" name="email">
		<br>
		Major
		<br>
		<?php
		foreach($majors as $i) {
			echo "<input type='radio' name='major' value='$i'> $i <br>";
		}
		?>
		<br>
		Comments
		<br>
		<textarea name="comments"></textarea>
		<br>
		Continents
		<br>
		<?php
		foreach($continents as $x => $x_val) {
			echo "<input type='checkbox' name='country[]' value=$x> $x_val <br>"
		}
		?>
		<button type="submit">Submit</button>
	</form>

</body>
</html>