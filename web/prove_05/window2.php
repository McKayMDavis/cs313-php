<?php
session_start();
$data = $_SESSION["table-results"];
$nrow = $_SESSION["table-nrow"];
var_dump($data);
var_dump($nrow);

//display table
echo "<table class='table table-bordered' style='width:100%'><tr>";
foreach($data[0] as $colname => $datum) {
	if (strpos($colname, 'id') === false) {
		echo "<th>" . $colname . "</th>";
	}
}
echo "</tr>";

for ($i = 0; $i < $nrow; $i++) {
	echo "<tr>";
	foreach($data[0] as $colname => $datum) {
		if (strpos($colname, 'id') === false) {
			echo "<td><input type='text' name='data[]'></td>";
		}
	}
	echo "</tr>";
}
echo "</table>";
?>