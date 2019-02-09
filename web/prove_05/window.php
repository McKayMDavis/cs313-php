<?php
session_start();
$data = $_SESSION["query-results"];

for ($i = 0; $i < sizeof($data); $i++) {
	foreach ($data[i] as $key => $value) {
		echo $value;
	}
}
?>