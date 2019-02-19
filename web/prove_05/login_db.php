<?php
require('db.php');

$logged_in = False;

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

$statement1 = $db->prepare("SELECT username FROM users WHERE username=:username");
$statement1->execute(array(":username"=>$username));
$results1 = $statement1->fetchAll(PDO::FETCH_ASSOC);

$statement2 = $db->prepare("SELECT password FROM users WHERE username=:username");
$statement2->execute(array(":username"=>$username));
$results2 = $statement2->fetchAll(PDO::FETCH_ASSOC);

if (password_verify($password, $results2[0]['password'])) {
	$logged_in = True;
}

$_SESSION["logged_in"] = $logged_in;
if ($logged_in) {
	flush();
	header("Location: app.php");
	die();
} else {
	flush();
	header("Location: login.php");
	die();
}
?>