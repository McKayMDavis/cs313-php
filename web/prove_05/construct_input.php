<?php
require('db.php');
$table = htmlspecialchars($_POST["data-type"]);

if ($table == 'expense') {
	$query = $db->query('SELECT * FROM expense WHERE expense_id=1');
} elseif ($table == 'revenue') {
	$query = $db->query('SELECT * FROM revenue WHERE revenue_id=1');
} elseif ($table == 'goal') {
	$query = $db->query('SELECT * FROM goal WHERE goal_id=1');
}

$results = $query->fetchAll(PDO::FETCH_ASSOC);

$_SESSION["table-results"] = $results;
$_SESSION["table-nrow"] = htmlspecialchars($_POST["nrow"]);
?>