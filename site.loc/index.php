<?php 
$f_name = "Иван";
$m_name = "Иванович";
$l_name = "Пупкин";
$age = "33";
$city = "Конотоп";
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Анкета</title>
</head>
<body>
	<form action="">
		<input type="text" name="f_name" placeholder="<?php echo $f_name ?>">
		<input type="text" name="m_name" placeholder="<?php echo $m_name ?>">
		<input type="text" name="l_name" placeholder="<?php echo $l_name ?>">
		<input type="text" name="age" placeholder="<?php echo $age ?>">
		<input type="text" name="city" placeholder="<?php echo $city ?>">
		<input type="submit" value="Отправить">
	</form>
	
</body>
</html>