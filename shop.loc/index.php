<?php 

require_once ('config.php');

$stmt = DB::$conn->query("SELECT id,title,price,image FROM `products`");
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Магазин</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="container">
		<h1>Інтернет-магазин &laquo;У Галі&raquo;</h1>
		<div class="wrapper">
			<?php  foreach ($products as $prod): ?>
				<div class="prod" id="<?php echo $prod['id']  ?>">
					<div class="prod__img">
						<img src="<?php echo IMG_PATH.$prod['image']  ?>" alt="">
					</div>
					<span class="prod__name" data-role="name"><?php echo $prod['title']  ?></span>
					<div class="prod__charact">
						<b>Артикул: </b><span data-role="id"><?php echo $prod['id'] ?></span>
					</div>
					<div class="prod__charact">
						<b>Ціна, грн./кг: </b><span data-role="price"><?php echo $prod['price'] ?></span>
					</div>
					<div class="quantity">
						<button class="btn minus" onclick="changeQuantity(this, -1)">-</button>
						<input type="text" name="quantity" value="0">
						<button class="btn plus" onclick="changeQuantity(this, 1)">+</button>					
					</div>
					<button class="btn buy" onclick="addToCart(this)">До кошику</button>
				</div>
			<?php endforeach; ?>
		</div>
		<a href="cart.php">Кошик</a>
		<div class="total">Сумма замовлення: <span id="total"><?php if(isset($_SESSION['total'])) {echo $_SESSION['total'];} ?></span> грн.</div>
	</div>
</body>

<script src="main.js"></script>
</html>




