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
	confirm($ajax['user']);
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

function confirm($user) {
	$data = [];

	foreach ($user as $key => $val) {
		if (empty($val)) {
			if(!isset($data['error'])) {
				$data['code'] = "error";
				$data['error'] = [];
			}
			array_push($data['error'], $key);
		}
	}

	if (isset($data['error'])) {
		$data['code'] = "error";
	} else {

		global $dsn;
		global $pdo;
		

		/*$dsn = "mysql:host=localhost;port=3306;dbname=store_db;charset=utf8";
		$pdo = new PDO($dsn, 'store', 'store');*/
		/*$stmt = $pdo->exec("INSERT INTO users (name, email, tel, address) VALUES (".$user['name'].", ".$user['email'].", ".$user['tel'].", ".$user['address'].")");*/
		$stmt = $pdo->prepare("INSERT INTO users (name, email, tel, address) VALUES (:name, :email, :tel, :address)");

		$stmt->execute(array(
			"name" => $user['address'],
			"email" => $user['email'],
			"tel" => $user['tel'],
			"address" => $user['address']
		));

		$data['code'] = "success";
	}

	

	echo json_encode($data);
}


?>


