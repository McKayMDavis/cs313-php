<?php
require('db.php');
$table = htmlspecialchars($_POST["data-type"]);

if ($table == 'expense') {
	$query = $db->query('SELECT * FROM expense WHERE false');
} elseif ($table == 'revenue') {
	$query = $db->query('SELECT * FROM revenue WHERE false');
} elseif ($table == 'goal') {
	$query = $db->query('SELECT * FROM goal WHERE false');
}

$results = $query->fetchAll(PDO::FETCH_ASSOC);
var_dump($results);

$_SESSION["table-results"] = $results;
$_SESSION["table-nrow"] = htmlspecialchars($_POST["nrow"]);
?>