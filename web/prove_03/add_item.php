<?php
session_start();
if (!isset($_SESSION['items'])) {
	$_SESSION['items'] = array();
}
$item = $_POST['item'];

if ($item != "Remove Item") {
	$_SESSION['items'][] = $item;
} else {
	$_SESSION['items'] = array_diff($_SESSION['items'], [$item])

}

$_SESSION['cartSize'] = sizeof($_SESSION['items']);
$json = array('item'=>$item, 'success'=>'true', 'cartSize'=>$_SESSION['cartSize']);
header('Content-type: application/json');
echo json_encode($json);
?>