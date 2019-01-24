<?php
session_start();
if (!isset($_SESSION['items'])) {
	$_SESSION['items'] = array();
}

$_SESSION['items'][] = $_POST['item'];
$_SESSION['cartSize'] = sizeof($_SESSION['items']);
$json = array('item'=>$_POST['item'], 'success'=>'true', 'cartSize'=>$_SESSION['cartSize']);

header('Content-type: application/json');
echo json_encode($json);
?>