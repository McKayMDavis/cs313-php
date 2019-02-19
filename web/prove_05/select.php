<?php
require('db.php');
$table = htmlspecialchars($_POST["data-type"]);
$year = htmlspecialchars($_POST["year"]);

if ($table == 'expense') {
	$query = $db->prepare('SELECT expense_id, description, vendor, amount, year, date_entered, last_update FROM expense WHERE year=:year');
} elseif ($table == 'revenue') {
	$query = $db->prepare('SELECT revenue_id, description, client, amount, year, date_entered, last_update FROM revenue WHERE year=:year');
} elseif ($table == 'goal') {
	$query = $db->prepare('SELECT goal_id, goal_expense, goal_revenue, goal_profits, year, date_entered, last_update FROM goal WHERE year=:year');
}

$query->execute(array(':year' => $year));
$results = $query->fetchAll(PDO::FETCH_ASSOC);

$_SESSION["query-results"] = $results;
?>