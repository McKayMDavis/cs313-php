<?php
session_start();
$data = $_SESSION["query-results"];

foreach ($data as $key => $rowname) {
	foreach ($data[$key] as $colname => $item) {
		echo $item;
	}
}
?>