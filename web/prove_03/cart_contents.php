<?php
session_start();
$items = $_SESSION['items'];
foreach ($items as $i) {
	echo $i . "<button class='remove'>Remove $i</button><br>";
}
?>