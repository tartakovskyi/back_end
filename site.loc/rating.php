<?php 

if ( !empty($_POST['pass'])) {
	echo rating($_POST['pass']);
} else {
	echo 'Ошибка! Поле "Пароль" не заполнено';
}


function rating($pass) {
	$rating = 0;

	$length = strlen($pass);
	if ($length <= 5) {
		$rating += 1;
	} elseif ($length > 5 && $length <= 10) {
		$rating += 2;
	} else {
		$rating += 3;
	}

	if (ctype_upper($pass)) $rating += 1;

	if (ctype_lower($pass)) $rating += 1;

	if (ctype_digit($pass)) $rating += 1;

	



	return $rating;
}










?>