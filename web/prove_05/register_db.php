<?php
require('db.php');

$username = htmlspecialchars($_POST["username"]);
$password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);

$statement1 = 
$db->prepare("INSERT INTO users(username, password, user_type, date_entered, last_update) VALUES (:username, :password, 1, CURRENT_DATE, :last_update)");
$statement1->execute(array(":username"=>$username, ":password"=>$password, ":last_update"=>$_SESSION["logged_in"]));

flush();
header("Location: register.php");
die();
?>