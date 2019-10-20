<?php 
require_once ('config.php');


$products = json_decode(file_get_contents("products.json"), true);
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Магазин</title>
	<style>
		* {
			font-family: sans-serif;
		}
		.container {
			margin: 0 auto;
			max-width: 1200px;
			display: -webkit-flex;
			display: -moz-flex;
			display: -ms-flex;
			display: -o-flex;
			display: flex;
			justify-content: space-around;
		}
		h1 {
			text-align: center;
			margin-bottom: 20px;
		}
		.prod {
			display: -webkit-flex;
			display: -moz-flex;
			display: -ms-flex;
			display: -o-flex;
			display: flex;
			-webkit-flex-direction: column;
			-moz-flex-direction: column;
			-ms-flex-direction: column;
			-o-flex-direction: column;
			flex-direction: column;
			width: 19%;
		}
		.prod__img {
			position: relative;
			padding-top: 70%;
		}
		.prod__img img {
			position: absolute;
			bottom: 0;
			width: 100%;
			height: 100%;
			object-fit: cover;
			object-position: 50%;
		}
		.prod__name {
			display: block;
			font-size: 22px;
			font-weight: 600;
			margin: 20px 0 10px;
		}
		button {
			background-color: #f03;
			color: #fff;
			font-size: 18px;
			padding: 15px 30px;
			cursor: pointer;
			border: none;
		}
		button:hover {
			background-color: #ea345a;
		}
		.buy {
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<h1>Інтернет-магазин &laquo;У Галі&raquo;</h1>
	<div class="container">
		<?php  foreach ($products as $prod): ?>
			<div class="prod" id="<?php echo $prod['id']  ?>">
				<div class="prod__img">
					<img src="<?php echo IMG_PATH.$prod['img']  ?>" alt="">
				</div>
				<span class="prod__name" data-role="name"><?php echo $prod['name']  ?></span>
				<div class="prod__charact">
					<b>Артикул: </b><span ><?php echo $prod['id'] ?></span>
				</div>
				<div class="prod__charact">
					<b>Ціна, грн./кг: </b><span data-role="price"><?php echo $prod['price'] ?></span>
				</div>
				<button class="buy" onclick="addToCart(this)">До кошику</button>
			</div>
		<?php endforeach; ?>
	</div>
	<a href="cart.php">Кошик</a>
</body>
</html>

<script>
	const addToCart = (btn) => {
		const prod = btn.parentNode
		const prodData = 
		{
			'id' : prod.id,
			'name' : prod.querySelector('[data-role="name"]').innerText,
			'price' : Number(prod.querySelector('[data-role="price"]').innerText),
			'quantity' : 1
		}
		let response = fetch('addtocart.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json;charset=utf-8'
			},
			body: JSON.stringify(prodData)
		})
		/*.then(function(response) {
			response.json().then(function(data) {  
				console.log(data);  
			});  

		})*/
	}

	
</script>







