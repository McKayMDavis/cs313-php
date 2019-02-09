<?php
session_start();
$data = $_SESSION["query-results"];
$headers = array();

echo "<table><tr>";
foreach($data[0] as $colname => $datum) {
	echo "<th>" . $colname . "</th>";
}
echo "</tr>";

foreach ($data as $row) {
	echo "<tr>";
	foreach ($row as $colname => $datum) {
		echo "<td>" . $datum . "</td>";
	}
	echo "</tr>";
}



/*// create header array here...$myHeaders
// create data array here... $myData

$csvName = 'temp.csv';

$fp = fopen($csvName, 'w');
fputcsv($fp, $myHeaders);
foreach ($myData as $line) {
    fputcsv($fp, $line);
}
fclose($fp);*/
?>