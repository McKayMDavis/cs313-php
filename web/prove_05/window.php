<?php
session_start();
$data = $_SESSION["query-results"];

echo $data;
?>