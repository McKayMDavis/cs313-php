<?php
require('db.php');
session_start();

$nrow = $_SESSION["table-nrow"];
$tname = $_SESSION["table-name"];
$data = $_POST["data"];

//CHANGE LAST UPDATE TO BE THE USER THAT IS LOGGED IN
if ($tname == 'expense') {
	for ($i = 0; $i < $nrow; $i++) {
		$statement = $db->prepare('INSERT INTO expense (description, vendor, amount, year, date_entered, last_update, goal_id) VALUES (:description, :vendor, :amount, :year, CURRENT_DATE, 1, (SELECT goal_id FROM goal WHERE year=:year))');
		$success = $statement->execute(array(':description' => $data[$i][0], ':vendor' => $data[$i][1], ':amount' => $data[$i][2], ':year' => $data[$i][3]));
	}
} elseif ($tname == 'revenue') {
	for ($i = 0; $i < $nrow; $i++) {
		$statement = $db->prepare('INSERT INTO expense (description, client, amount, year, date_entered, last_update, goal_id) VALUES (:description, :client, :amount, :year, CURRENT_DATE, 1, (SELECT goal_id FROM goal WHERE year=:year))');
		$success = $statement->execute(array(':description' => $data[$i][0], ':client' => $data[$i][1], ':amount' => $data[$i][2], ':year' => $data[$i][3]));
	}
}

flush();
header("Location: enter.php");
die();
?>