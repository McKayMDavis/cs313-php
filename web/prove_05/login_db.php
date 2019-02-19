<?php
require('db.php');

unset($_SESSION["logged_in"]);

$username = htmlspecialchars($_POST["username"]);
$password = htmlspecialchars($_POST["password"]);

$statement1 = $db->prepare("SELECT user_id, username, password, user_type FROM users WHERE username=:username");
$statement1->execute(array(":username"=>$username));
$results = $statement1->fetchAll(PDO::FETCH_ASSOC);

if (password_verify($password, $results[0]['password'])) {
	$logged_in = array('type'=>$results[0]['user_type'], 'id'=>$results[0]['user_id']);
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