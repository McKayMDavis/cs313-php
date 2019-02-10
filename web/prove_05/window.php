<?php
session_start();
$data = $_SESSION["query-results"];
$headers = array();
$rows = array();

//display table
echo "<table><tr>";
foreach($data[0] as $colname => $datum) {
	echo "<th>" . $colname . "</th>";
	$headers[] = $colname;
}
echo "</tr>";

foreach ($data as $row) {
	echo "<tr>";
	foreach ($row as $colname => $datum) {
		echo "<td>" . $datum . "</td>";
	}
	echo "</tr>";
}
echo "</table>";

//write csv
$csvName = 'temp.csv';

$fp = fopen($csvName, 'w');
fputcsv($fp, $headers);
foreach ($data as $row) {
    fputcsv($fp, array_values($row));
}
fclose($fp);

exec("Rscript plots.R");
echo "<img src='temp.png'></img>";
?>