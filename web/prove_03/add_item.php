<?php
session_start();
if (!isset($_SESSION['items'])) {
	$_SESSION['items'] = array();
}
$item = htmlspecialchars($_POST['item']);

if (strpos($item, "Remove") === false) {
	$_SESSION['items'][$item] = $item;
} else {
	str_replace("Remove ", "", $item);
	unset($_SESSION['items'][$item]);

}

$_SESSION['cartSize'] = sizeof($_SESSION['items']);
$json = array('item'=>$item, 'success'=>'true', 'cartSize'=>$_SESSION['cartSize']);
header('Content-type: application/json');
echo json_encode($json);
?>