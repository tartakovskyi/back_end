<?php 
require_once ('config.php');
//var_dump($_SESSION['cart']);

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
		<h1>Товари у кошику</h1>
		<table class="cartTable">
			<thead>
				<tr>
					<th>Артикул</th>
					<th>Назва</th>
					<th>Ціна, грн.</th>
					<th>Кільість, кг</th>
					<th>Сумма, грн.</th>
					<th>Видалити</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($_SESSION['cart'] as $prod): ?>
					<tr>
						<td><?php echo $prod['id'] ?></td>
						<td><?php echo $prod['name'] ?></td>
						<td><?php echo $prod['price'] ?></td>
						<td>
							<div class="quantity">
								<button class="minus" onclick="changeQuantity(this, -1)">-</button>
								<input type="text" name="quantity" value="<?php echo $prod['quantity'] ?>">
								<button class="plus" onclick="changeQuantity(this, 1)">+</button>					
							</div>
						</td>
						<td><?php echo $prod['price']*$prod['quantity'] ?></td>
						<td><a href="#" class="del">X</a></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="5" class="cartTable__total">Сумма до сплати: <?php  echo $_SESSION['total'] ?> грн.</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

<script src="main.js"></script>
<script>
	const delBtns = document.getElementsByClassName('del')
	for (var i = 0; i < delBtns.length; i++) {
		let del = delBtns[i]
		del.addEventListener('click', function (e) {
			e.preventDefault()
			const prod = this.parentNode.parentNode
			const prodId = prod.querySelector('td').innerText
			prod.remove()

			console.log(prod)

		})
	}
</script>
</html>


