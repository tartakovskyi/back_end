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

	case 'confirm':
	confirm($ajax['user'], $dsn, $pdo);
	break;
};


function add ($prod) {
	$id = $prod['id'];
	if (isset($_SESSION['cart'][$id])) {
		$_SESSION['cart'][$id]['quantity'] += $prod['quantity'];
	} else {
		$_SESSION['cart'][$id] = $prod;
	}
	total();
}

function delete ($prod) {
	$id = $prod['id'];
	if (isset($_SESSION['cart'][$id])) {
		unset($_SESSION['cart'][$id]);
	}
	total();
}


function total () {
	$total = 0;
	foreach ($_SESSION['cart'] as $productInCart) {
		$prodTotal = $productInCart['price'] * $productInCart['quantity'];
		$total += round($prodTotal, 2);
	}

	$_SESSION['total'] = $total;

	echo json_encode($total);
}

function confirm($user, $dsn, $pdo) {

	$data = [];

	foreach ($user as $key => $val) {
		if (empty($val)) {
			if(!isset($data['error'])) {
				$data['code'] = "error";
				$data['error'] = [];
			}
			$data['error'][] = $key;
		}
	}

	if (isset($data['error'])) {

		$data['code'] = "error";

	} else {

		$stmt = $pdo->prepare("INSERT INTO users (login, password, name, email, tel, address) VALUES ('".$user['login']."', '".$user['password']."', '".$user['name']."', '".$user['email']."', '".$user['tel']."', '".$user['address']."')");

		$stmt->execute();

		$stmtUserId = $pdo->query("SELECT id FROM users ORDER BY id DESC LIMIT 1");

		$userId = $stmtUserId->fetch(PDO::FETCH_NUM);

		$stmtOrder = $pdo->exec("INSERT INTO orders (user_id, amount) VALUES ('".$userId[0]."', '".$_SESSION['total']."')");

		$stmtOrderId = $pdo->query("SELECT id FROM orders ORDER BY id DESC LIMIT 1");

		$orderId = $stmtOrderId->fetch(PDO::FETCH_NUM);

		foreach ($_SESSION['cart'] as $prod) {

			$stmtOrderProd = $pdo->prepare("INSERT INTO order_products (order_id, product_id, product_name, quantity) VALUES ('".$orderId[0]."', '".$prod['id']."', '".$prod['name']."', '".$prod['quantity']."')");

			$stmtOrderProd->execute();

		}

		unset($_SESSION['cart'], $_SESSION['total']);

		$data['code'] = "success";

		$data['id'] = $orderId[0];


		/*header('Location: /thank.php?id='.$orderId);*/
	}

	echo json_encode($data);


}


?>


