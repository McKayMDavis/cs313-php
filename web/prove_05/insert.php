<?php
require('db.php');
session_start();

$nrow = $_SESSION["nrow"];
$tname = $_SESSION["table-name"];
$data = htmlspecialchars($_POST["data"]);
var_dump($nrow);
var_dump($tname);
var_dump($_POST["data"]);

//CHANGE LAST UPDATE TO BE THE USER THAT IS LOGGED IN
if ($tname == 'expense') {
	for ($i; $i < $nrow; $i++) {
		try {
			$db->prepare('INSERT INTO expense (description, vendor, amount, year, date_entered, last_update, goal_id) VALUES (:description, :vendor, :amount, :year, CURRENT_DATE, 1, (SELECT goal_id FROM goal WHERE year=:year))');
			$db->execute(array(':description' => $data[$i][1] , ':vendor' => $data[$i][2] , ':amount' => $data[$i][3] , ':year' => $data[$i][4]));
		} catch (PDOException $ex) {
			echo "FAILED" . $ex->getMessage();
		}
	}
} elseif ($tname == 'revenue') {
	for ($i; $i < $nrow; $i++) {
		$db->prepare('INSERT INTO expense (description, client, amount, year, date_entered, last_update, goal_id) VALUES (:description, :client, :amount, :year, CURRENT_DATE, 1, (SELECT goal_id FROM goal WHERE year=:year))');
		$db->execute(array(':description' => $data[$i][1] , ':client' => $data[$i][2] , ':amount' => $data[$i][3] , ':year' => $data[$i][4]));
	}
}
?>