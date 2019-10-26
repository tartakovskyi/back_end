<?php 
require_once ('config.php');
$ajax = json_decode(file_get_contents('php://input'), true);







switch ($ajax['function']) {

	case 'add':
	add($ajax['product']);
	break;
	
	case 'delete':
	delete($ajax['product']);
	break;
};



function add ($prod) {
	$id = $prod['id'];
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity'] += $prod['quantity'];
	} else {
		$_SESSION['cart'][$id] = $prod;
	}
}


function delete ($prod) {
	$id = $prod['id'];
	if (isset($_SESSION['cart'][$id])) {
		unset($_SESSION['cart'][$id]);
	}
}

$total = 0;
foreach ($_SESSION['cart'] as $productInCart) {
	$prodTotal = $productInCart['price'] * $productInCart['quantity'];
	$total += round($prodTotal, 2);
}

$_SESSION['total'] = $total;

echo json_encode($total);

?>


