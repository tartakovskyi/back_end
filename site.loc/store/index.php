<?php 

require_once ('config.php');

$products = json_decode(file_get_contents("products.json"), true);

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Магазин</title>
	<link rel="stylesheet" href="style.css">
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
	<?php if(isset($_SESSION['total'])): ?><div class="total">Сумма замовлення: <span id="total"><?php echo $_SESSION['total']; ?></span> грн.</div><?php endif; ?>
</body>
</html>

<script>
	const changeQuantity = (btn, num) => {
		const prod = btn.parentNode
		const quantity =  prod.querySelector('[name="quantity"]')
		quantity.value = Number(quantity.value) + num
 	}


	const addToCart = (btn) => {
		const prod = btn.parentNode
		const prodData = 
		{
			'id' : prod.id,
			'name' : prod.querySelector('[data-role="name"]').innerText,
			'price' : Number(prod.querySelector('[data-role="price"]').innerText),
			'quantity' : Number(prod.querySelector('[name="quantity"]').value)
		}
		let response = fetch('addtocart.php', {
			method: 'POST',
			headers: {
				'Content-Type': 'application/json;charset=utf-8'
			},
			body: JSON.stringify(prodData)
		})
		.then(function(response) {
			response.json().then(function(data) {  
				changeTotal(data)
			});  

		})

		const changeTotal = (sum) => {
			const totalElem = document.getElementById('total')
			totalElem.innerText = sum
		}
	}

	
</script>







