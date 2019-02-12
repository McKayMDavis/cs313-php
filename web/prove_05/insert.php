<?php
session_start();
require('db.php');

$ncol = $_SESSION["ncol"];
$nrow = $_SESSION["nrow"];

var_dump($_POST["data"]);
?>