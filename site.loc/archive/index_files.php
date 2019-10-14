<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Авторизация</title>
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
	<h1>Авторизация</h1>
	<form action="/files.php" method="POST">
		<label><span>Логин:</span><input type="text" name="name" placeholder="Terminator"></label>
		<label><span>Пароль:</span><input type="password" name="pass" placeholder="123456"></label>
		<input type="submit" value="Отправить">
	</form>	
</body>
</html>