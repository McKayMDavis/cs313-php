<?php
session_start();
unset($_SESSION["logged_in"]);

flush();
header("Location: login.php");
die();
?>