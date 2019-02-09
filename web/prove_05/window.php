<?php
session_start();
$data = $_SESSION["query-results"];

foreach ($data as $key => $value) {
	echo $value;
}
?>