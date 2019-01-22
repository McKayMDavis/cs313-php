<!DOCTYPE html>
<html>
<head>
	<title>bob2</title>
</head>
<body>
<?php
$name = $_POST["name"];
$email = $_POST["email"];
$major = $_POST["major"];
$comments = $_POST["comments"];
$conts = $_POST["country"];
$continents = array("na"=>"North America",
					"sa"=>"South America",
					"eu"=>"Europe",
					"a"=>"Asia",
					"au"=>"Australia",
					"af"=>"Africa",
					"ant"=>"Antarctica");
?>

Name: <?php echo $name;?>
<br>
Email: <a href= <?php echo "mailto:" . $email;?> > <?php echo $email; ?> </a>
<br>
Major: <?php echo $major;?>
<br>
Comments: <?php echo $comments;?>
<br>
Continents:
<?php
foreach ($conts as $i) {
	foreach($continents as $x => $x_val) {
		if ($i == $x) {
			echo $x_val;
		}
	}
}
?>
</body>
</html>