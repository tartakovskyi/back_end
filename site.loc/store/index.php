<?php 

require_once ('config.php');

//$products = json_decode(file_get_contents("products.json"), true);

$con = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME) 
or die("Ошибка " . mysqli_error($con));

mysqli_query($con, "SET NAMES UTF8");
$query = mysqli_query($con, "SELECT * FROM `products`");

$products = mysqli_fetch_all($query,MYSQLI_ASSOC);
var_dump($products);

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
						<button class="minus" onclick="changeQuantity(this, -1)">-</button>
						<input type="text" name="quantity" value="0">
						<button class="plus" onclick="changeQuantity(this, 1)">+</button>					
					</div>
					<button class="buy" onclick="addToCart(this)">До кошику</button>
				</div>
			<?php endforeach; ?>
		</div>
		<a href="cart.php">Кошик</a>
		<div class="total">Сумма замовлення: <span id="total"><?php if(isset($_SESSION['total'])) {echo $_SESSION['total'];} ?></span> грн.</div>
	</div>
</body>

<script src="main.js"></script>
</html>




