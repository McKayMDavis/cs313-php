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

$query = $db->prepare('SELECT * FROM :table WHERE year=:year');
$query->execute(array(':table' => $table, ':year' => $year));
$results = $query->fetchAll(PDO::FETCH_ASSOC);

$_SESSION["query-results"] = $results;
echo $results;
?>