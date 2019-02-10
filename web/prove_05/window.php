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

$csvData = file_get_contents($csvName);
header('Content-Type: application/vnd.ms-excel');
header('Content-Length: ' . strlen($csvData));
echo $csvData;
exit;

exec("Rscript plots.R");
echo "<img src='temp.png'></img>";
?>