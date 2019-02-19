<?php
require('db.php');

$username = htmlspecialchars($_POST["username"]);
$password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);
$user_type = htmlspecialchars($_POST["user-type"]);
if ($user_type == "Admin") {
	$user_type_id = 1;
} elseif ($user_type == "User") {
	$user_type_id = 2;
}

$statement1 = 
$db->prepare("INSERT INTO users(username, password, user_type, date_entered, last_update) VALUES (:username, :password, :user_type, CURRENT_DATE, 1)");
$statement1->execute(array(":username"=>$username, ":password"=>$password, ":user_type"=>$user_type_id));

flush();
header("Location: register.php");
die();
?>