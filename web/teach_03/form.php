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
					"CE"=>"Computer Engineering")
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
		<input type="checkbox" name="country[]" value="na"> North America	<br>	
		<input type="checkbox" name="country[]" value="sa"> South America <br>
		<input type="checkbox" name="country[]" value="eu"> Europe <br>
		<input type="checkbox" name="country[]" value="asia"> Asia <br>
		<input type="checkbox" name="country[]" value="au"> Australia <br>
		<input type="checkbox" name="country[]" value="africa"> Africa <br>
		<input type="checkbox" name="country[]" value="ant"> Antarctica <br>
		<br>
		<button type="submit">Submit</button>
	</form>

</body>
</html>