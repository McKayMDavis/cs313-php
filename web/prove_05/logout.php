<?php
session_start();
$_SESSION["logged_in"] = False;

flush();
header("Location: login.php");
die();
?>