<?php
session_start();
$data = $_SESSION["query-results"];

foreach ($data as $key => $rowname) {
	foreach ($value as $colname => $data) {
		echo $data;
	}
}
?>