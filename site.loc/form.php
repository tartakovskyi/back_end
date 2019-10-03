<?php 
$f_name = "Иван";
$m_name = "Иванович";
$l_name = "Пупкин";
$age = "33";
$city = "Конотоп";

$lang = ['en' => 'English', 'ru' => 'Русский', 'uk' => 'Українська']
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Анкета</title>
	<style>
		* {
			box-sizing: border-box;
		}
		body {
			width: 300px;
			margin: 0 auto;
		}
		h1 {text-align: center;}
		form {
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
		}
		form span {
			display: inline-block;
			position: absolute;
			left: -10px;
			top: 50%;
			transform: translate(-100%, -50%);
		}
		form label {
			position: relative;
			margin-bottom: 10px;
		}
		form input {
			border-radius: 3px;
			padding: 10px;
			width: 300px;
		}
		form [type="text"] {
			border: 1px solid #e5eaed;
		}
		form [type="submit"] {
			background: linear-gradient(#42a1ec, #0070c9);
			border: 1px solid #07c;
			color: #fff;
		}
	</style>
</head>
<body>
	<select name="lang">
		<option value="en" selected><?php echo $lang['en']; ?></option>
		<option value="ru"><?php echo $lang['ru']; ?></option>
		<option value="uk"><?php echo $lang['uk']; ?></option>
	</select>
	<h1>Анкета</h1>
	<form action="">
		<label><span>Имя:</span><input type="text" name="f_name" placeholder="<?php echo $f_name ?>"></label>
		<label><span>Отчество:</span><input type="text" name="m_name" placeholder="<?php echo $m_name ?>"></label>
		<label><span>Фамилия:</span><input type="text" name="l_name" placeholder="<?php echo $l_name ?>"></label>
		<label><span>Полных лет:</span><input type="text" name="age" placeholder="<?php echo $age ?>"></label>
		<label><span>Город:</span><input type="text" name="city" placeholder="<?php echo $city ?>"></label>
		<input type="submit" value="Отправить">
	</form>	
</body>
</html>
