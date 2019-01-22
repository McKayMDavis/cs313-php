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
$continents = $_POST["country"];
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
foreach ($continents as $value) {
	echo "$value <br>";
}
?>
</body>
</html>