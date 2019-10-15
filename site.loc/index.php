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
		.rating {
			display: none;
		}
	</style>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
	<h1>Придумайте пароль</h1>
	<form id=form>
		<label><span>Пароль:</span><input type="text" name="pass" placeholder="123456"></label>
		<input type="submit" value="Отправить">
		<p class="rating"></p>
	</form>	
</body>

<script>
	const form = document.getElementById('form')
	form.addEventListener('submit', function (e) {
		e.preventDefault()

		$.ajax({
			url:     '/rating.php',
			type:     "POST",
			dataType: "html", 
			data: $(this).serialize(),
			success: function(response) {
				var text
				var color
				if (Number(response) <= 4) {
					text = 'слабый'
					color = 'red'
				} else if ((Number(response) > 4 && Number(response) < 6)) {
					text = 'средний'
					color = 'orange'
				} else {
					text = 'надежный'
					color = 'green'
				}
				$('.rating').html('Оценка пароля: '+response+' - '+text).css('color', color).show()
			},
			error: function(response) {
				console.log('Ошибка. Данные не отправлены.');
			}
		});
	})
</script>
</html>