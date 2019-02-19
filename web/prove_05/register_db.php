<?php
require('db.php');

$logged_in = False;

$username = htmlspecialchars($_POST["username"]);
$password = password_hash(htmlspecialchars($_POST["password"]), PASSWORD_DEFAULT);

$statement1 = $db->prepare("INSERT INTO users(username, password, user_type, date_entered, last_update) VALUES (:username, :password, 1, CURRENT_DATE, 1)";
$statement1->execute(array(":username"=>$username, ":password"=>$password));

$_SESSION["logged_in"] = True;
flush();
header("Location: app.php");
die();
?>