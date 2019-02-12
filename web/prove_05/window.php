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

echo "<a href='temp.csv'>Download CSV</a><br>";

//Had to use R buildpack to get Rscript installed in the slug
exec("/app/bin/Rscript plots.R", $output);
echo $output;
echo "<img src='temp.png' alt='Plot Image'></img>";
?>