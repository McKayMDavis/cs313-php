<?php
session_start();
foreach ($items as $i) {
	echo $i . "<button class='remove'>Remove Item</button><br>";
}
?>
