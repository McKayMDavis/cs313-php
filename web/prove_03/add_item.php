<?php
session_start();
if (!isset($_SESSION['items'])) {
	$_SESSION['items'] = array();
}

$_SESSION['items'][] = $_POST['item'];
$json = array('item'=>$_POST['item'], 'success'=>'true', 'cartSize'=>sizeof($_SESSION['items']));

header('Content-type: application/json');
echo json_encode($json);
?>