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
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
	<h1>Придумайте пароль</h1>
	<form id=form>
		<label><span>Пароль:</span><input type="text" name="pass" placeholder="123456"></label>
		<input type="submit" value="Отправить">
	</form>	
</body>

<script>
	const form = document.getElementById('form')
	form.addEventListener('submit', function (e) {
		e.preventDefault()


		$.ajax({
        url:     '/rating.php', //url страницы (action_ajax_form.php)
        type:     "POST", //метод отправки
        dataType: "html", //формат данных
        data: $(this).serialize(),  // Сеарилизуем объект
        success: function(response) { //Данные отправлены успешно
        	console.log(response)
        },
    	error: function(response) { // Данные не отправлены
    		console.log('Ошибка. Данные не отправлены.');
    	}
    });


  /*  var form_data = new FormData(this)
    var body = form_data.get('pass')
    console.log(body)
    fetch('rating.php', {
    	method: 'POST',
    	headers: {
    		'Content-Type': 'text/html;charset=utf-8'
    	},
    	body: body
    })
    .then(response => response.text())
    .then(result => console.log)*/


		/*var form_data = new FormData(this)
		var body = form_data.get('pass')
		console.log(body)

		var request = new XMLHttpRequest();
		request.open("POST", '/rating.php');
		request.setRequestHeader('Content-Type', 'text/html; charset=UTF-8');
		request.onload = function(e) {
			var resp = request.response;
			console.log(resp)
		}
		request.send(body);*/
	})


/*
function requestOptions(select) {
	const name = select.attr('name')
	const val = select.val()
	$nextSelect = select.next().next('select')
	$nextSelect.find('option').each(function(){
		if (!$(this).data('skip') === 1) {$(this).remove()}
	})
	$nextDropDown = $nextSelect.next('.tzSelect').find('.dropDown')
	$nextDropDown.html('')
	$.ajax({
		url: "engine/ajax/controller.php?mod=request_options",   
		method: "POST",
		data: {selType: name, selOpt: val}
	}).done(function(answer) {
		const arr = JSON.parse(answer);
		for(key in arr) {
			var opt = document.createElement('option');
			opt.value = arr[key];
			$nextSelect.append(opt);
			var newli = document.createElement('li');
			newSpan = document.createElement('span');
			newSpan.innerText = arr[key];
			$nextDropDown.append(newli);
			$nextDropDown.find('li:last-child').append(newSpan);
			newli.addEventListener('click', function() {liOnClick(this)})
		}
	}).fail(function() {
		console.log("Помилка AJAX"); 
	});
}*/
</script>
</html>