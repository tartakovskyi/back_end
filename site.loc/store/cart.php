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
		<?php if (empty($_SESSION['cart'])) {echo "Кошик порожній";} else { ?>
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
						<td data-role="id"><?php echo $prod['id'] ?></td>
						<td data-role="name"><?php echo $prod['name'] ?></td>
						<td data-role="price"><?php echo $prod['price'] ?></td>
						<td>
							<div class="quantity">
								<button class="minus" onclick="changeQuantity(this, -1, true)">-</button>
								<input type="text" name="quantity" value="<?php echo $prod['quantity'] ?>">
								<button class="plus" onclick="changeQuantity(this, 1, true)">+</button>					
							</div>
						</td>
						<td data-role="sum"><?php echo $prod['price']*$prod['quantity'] ?></td>
						<td><a href="#" class="del">X</a></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="6" class="cartTable__total">Сумма до сплати: <span id="total"><?php  echo $_SESSION['total'] ?></span> грн.</td>
				</tr>
			</tbody>
		</table>
	<?php } ?>

	<div class="cart-buttons">
		<a href="index.php" class="btn btn--transp">Продовжити замовляти</a>
		<button class="btn" id="order">Оформити замовлення</button>

	</div>

	<div class="form-wrapper" id="orderFormWrapper">
		<h2>Контактні дані замовника</h2>
		<form id="orderForm">
			<label><span>ПІБ:</span><input required type="text" name="name" placeholder="Іван Пупкін"></label>
			<label><span>E-mail:</span><input required type="email" name="email" placeholder="test@test.com"></label>
			<label><span>Телефон:</span><input required type="tel" pattern ="[0-9]" name="tel" placeholder="0681112233"></label>
			<label><span>Адреса:</span><textarea required rows="6" name="address" placeholder="Полтавська обл., с.Пилипенки, вул.Петлюри, 20"></textarea></label>
			<input type="submit" value="Відправити">
		</form>
	</div>
	</div>
</body>

<script src="main.js"></script>
<script>
	window.onload = addListenerDelProd(), addListenerOrder()
</script>
</html>


