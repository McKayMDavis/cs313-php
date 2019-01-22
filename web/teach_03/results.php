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
?>

Name: <?php echo $name;?>
<br>
Email: <a href= <?php echo "mailto:" . $email;?> > <?php echo $email; ?> </a>
<br>
Major: <?php echo $major;?>
<br>
Comments: <?php echo $comments;?>
</body>
</html>