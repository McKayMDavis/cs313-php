<?php
session_start();
try
{
	$dbUrl = getenv('DATABASE_URL');

	$dbOpts = parse_url($dbUrl);

	$dbHost = $dbOpts["host"];
	$dbPort = $dbOpts["port"];
	$dbUser = $dbOpts["user"];
	$dbPassword = $dbOpts["pass"];
	$dbName = ltrim($dbOpts["path"],'/');

	$db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
	echo 'Error!: ' . $ex->getMessage();
	die();
}

$table = htmlspecialchars($_POST["data-type"]);
$year = htmlspecialchars($_POST["year"]);

if ($table == 'expense') {
	$query = $db->prepare('SELECT * FROM expense WHERE year=:year');
} elseif ($table == 'revenue') {
	$query = $db->prepare('SELECT * FROM revenue WHERE year=:year');
} elseif ($table == 'goal') {
	$query = $db->prepare('SELECT * FROM goal WHERE year=:year');
} elseif ($table == 'total') {
	$query = $db->prepare('SELECT * FROM total WHERE year=:year');
}

$query->execute(array(':year' => $year));
$results = $query->fetchAll(PDO::FETCH_ASSOC);

$_SESSION["query-results"] = $results;
?>