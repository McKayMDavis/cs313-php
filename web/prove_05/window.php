<?php
session_start();
$data = $_SESSION["query-results"];
$headers = array();
$rows = array();

//display table
echo "<table class='table table-bordered' style='width:100%'><tr>";
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

//write csv (this part works)
$csvName = 'temp.csv';

$fp = fopen($csvName, 'w');
fputcsv($fp, $headers);
foreach ($data as $row) {
    fputcsv($fp, array_values($row));
}
fclose($fp);
$N = 1;
//make a plot from the csv (this doesn't work for some reason). The R script is called and executes but the image file doesn't seem to be saving. I'm wondering if it either isn't getting the csv properly or if the image isn't saving properly. I have no idea how to check these.
exec("Rscript plots.R $N", $resp);
echo $resp;
echo "<img src='temp.png' alt='Plot Image'></img>";
?>