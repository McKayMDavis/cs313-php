<?php
session_start();
$data = $_SESSION["query-results"];

foreach ($data as $row) {
	foreach ($row as $colname => $datum) {
		echo $datum;
	}
}
?>