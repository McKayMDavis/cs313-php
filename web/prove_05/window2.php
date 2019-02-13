<?php
session_start();
$data = $_SESSION["table-results"];
$nrow = $_SESSION["table-nrow"];

//display table
echo "<form id='enter' action='insert.php' method='POST' autocomplete='off'>";
echo "<table class='table table-bordered' style='width:100%'><tr>";
foreach($data[0] as $colname => $datum) {
	if (strpos($colname, 'id') === false) {
		if (strpos($colname, 'date_entered') === false) {
			if (strpos($colname, 'last_update') === false) {
				echo "<th>" . $colname . "</th>";
				$ncol += 1;
			}
		}
	}
}
echo "</tr>";

for ($i = 0; $i < $nrow; $i++) {
	echo "<tr>";
	foreach($data[0] as $colname => $datum) {
		if (strpos($colname, 'id') === false) {
			if (strpos($colname, 'date_entered') === false) {
				if (strpos($colname, 'last_update') === false) {
					echo "<td><input type='text' name='data[$i][]'></td>";
				}
			}
		}
	}
	echo "</tr>";
}
echo "</table>";
echo "<input type='submit' value='Add Rows'>";
echo "</form>";
?>