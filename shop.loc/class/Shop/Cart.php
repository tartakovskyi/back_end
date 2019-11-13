<?php 

namespace Shop {

	class Cart {
		public $response = 'test';


		public function execute ($func, $data) {
			$this->$func($data);
		} 

		private function add ($prod) {
			$id = $prod['id'];
			if (isset($_SESSION['cart'][$id])) {
				$_SESSION['cart'][$id]['quantity'] += $prod['quantity'];
			} else {
				$_SESSION['cart'][$id] = $prod;
			}
			$this->total();
		}

		private function delete ($prod) {
			$id = $prod['id'];
			if (isset($_SESSION['cart'][$id])) {
				unset($_SESSION['cart'][$id]);
			}
			$this->total();
		}


		private function total () {
			$total = 0;
			foreach ($_SESSION['cart'] as $productInCart) {
				$prodTotal = $productInCart['price'] * $productInCart['quantity'];
				$total += round($prodTotal, 2);
			}

			$_SESSION['total'] = $total;

			$this->response = json_encode($total); 
		}

		private function confirm($user) {

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

				$stmt = DB::$conn->prepare("INSERT INTO users (login, password, name, email, tel, address) VALUES ('".$user['login']."', '".$user['password']."', '".$user['name']."', '".$user['email']."', '".$user['tel']."', '".$user['address']."')");

				$stmt->execute();

				$stmtUserId = DB::$conn->query("SELECT id FROM users ORDER BY id DESC LIMIT 1");

				$userId = $stmtUserId->fetch(PDO::FETCH_NUM);

				$stmtOrder = DB::$conn->exec("INSERT INTO orders (user_id, amount) VALUES ('".$userId[0]."', '".$_SESSION['total']."')");

				$stmtOrderId = DB::$conn->query("SELECT id FROM orders ORDER BY id DESC LIMIT 1");

				$orderId = $stmtOrderId->fetch(PDO::FETCH_NUM);

				foreach ($_SESSION['cart'] as $prod) {

					$stmtOrderProd = DB::$conn->prepare("INSERT INTO order_products (order_id, product_id, product_name, quantity) VALUES ('".$orderId[0]."', '".$prod['id']."', '".$prod['name']."', '".$prod['quantity']."')");

					$stmtOrderProd->execute();

				}

				unset($_SESSION['cart'], $_SESSION['total']);

				$data['code'] = "success";

				$data['id'] = $orderId[0];
			}


			$this->response = json_encode($data);

		}

	}

}


?>


