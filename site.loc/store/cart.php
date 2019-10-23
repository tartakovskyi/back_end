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
				</tr>
			</thead>
			<tbody>
				<?php foreach ($_SESSION['cart'] as $prod): ?>
					<tr>
						<td><?php echo $prod['id'] ?></td>
						<td><?php echo $prod['name'] ?></td>
						<td><?php echo $prod['price'] ?></td>
						<td><?php echo $prod['quantity'] ?></td>
						<td><?php echo $prod['price']*$prod['quantity'] ?></td>
					</tr>
				<?php endforeach; ?>
				<tr>
					<td colspan="5" class="cartTable__total">Сумма до сплати: <?php  echo $_SESSION['total'] ?> грн.</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>
</html>


