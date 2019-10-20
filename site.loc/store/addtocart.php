<?php 
require_once ('config.php');
$newProd = json_decode(file_get_contents('php://input'), true);
$id = $newProd['id'];
if (isset($_SESSION['cart'][$id])) {
	$_SESSION['cart'][$id]['quantity'] += $newProd['quantity'];
} else {
	$_SESSION['cart'][$id] = $newProd;
}

 ?>

