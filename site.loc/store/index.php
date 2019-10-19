<?php 
require_once ('config.php');

session_start();

$products = json_decode(file_get_contents("products.json"), true);
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Магазин</title>
	<style>
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
		.prod__title {
			font-size: 22px;
			font-weight: 600;
			margin: 20px 0 15px;
		}
	</style>
</head>
<body>
	<div class="container">
		
	

	<?php  foreach ($products as $prod): ?>

		<div class="prod">
			<img src="<?php echo IMG_PATH.$prod['img']  ?>" alt="">
			<span class="prod__title"><?php echo $prod['name']  ?></span>
			<div class="prod__charact">
				<b>Артикул: </b><span><?php echo $prod['id'] ?></span>
			</div>
			<div class="prod__charact">
				<b>Цена, грн./кг: </b><span><?php echo $prod['price'] ?></span>
			</div>
		</div>
	<?php endforeach; ?>
	</div>
</body>
</html>







