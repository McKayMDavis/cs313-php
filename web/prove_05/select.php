<?php
require('db.php');
$table = htmlspecialchars($_POST["data-type"]);
$year = htmlspecialchars($_POST["year"]);

if ($table == 'expense') {
	$query = $db->prepare('SELECT * FROM expense WHERE year=:year');
} elseif ($table == 'revenue') {
	$query = $db->prepare('SELECT * FROM revenue WHERE year=:year');
} elseif ($table == 'goal') {
	$query = $db->prepare('SELECT * FROM goal WHERE year=:year');
}

$query->execute(array(':year' => $year));
$results = $query->fetchAll(PDO::FETCH_ASSOC);

$_SESSION["query-results"] = $results;
?>