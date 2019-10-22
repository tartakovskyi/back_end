<?php 
require_once ('config.php');
$newProd = json_decode(file_get_contents('php://input'), true);
$id = $newProd['id'];
if (isset($_SESSION['cart'][$id])) {
	$_SESSION['cart'][$id]['quantity'] += $newProd['quantity'];
} else {
	$_SESSION['cart'][$id] = $newProd;
}

$total = 0;
foreach ($_SESSION['cart'] as $productInCart) {
	$prodTotal = $productInCart['price'] * $productInCart['quantity'];
	$total += round($prodTotal, 2);
}

$_SESSION['total'] = $total;

echo json_encode($total);

 ?>

