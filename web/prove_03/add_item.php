<?php
session_start();
if (!isset($_SESSION['items'])) {
	$_SESSION['items'] = array();
}
if (!isset($_SESSION['prices'])) {
	$_SESSION['prices'] = array();
}
$input = htmlspecialchars($_POST['item']);
$item = preg_split("/-/", $input)[0];
$price = preg_split("/-/", $input)[1];

//Just so you know, this forces the user to only be able to purchase one of each item
//We'll want to make this a dictionary with price and quantity added so that we can display these in the cart and checkout
if (strpos($item, "Remove") === false) {
	$_SESSION['items'][$item] = $item;
	$_SESSION['prices'][$item] = $price;
} else {
	$item = str_replace("Remove ", "", $item);
	unset($_SESSION['items'][$item]);

}

$_SESSION['cartSize'] = sizeof($_SESSION['items']);
$json = array('item'=>$item, 'success'=>'true', 'cartSize'=>$_SESSION['cartSize']);
header('Content-type: application/json');
echo json_encode($json);
?>