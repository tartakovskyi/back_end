<?php 

if ( !empty($_POST['pass'])) {
	echo rating($_POST['pass']);
} else {
	echo 'Ошибка! Поле "Пароль" не заполнено';
}


function rating($pass) {
	$rating = 0;
	$digits = false;
	$upperCase = false;
	$lowerCase = false;

	$length = strlen($pass);
	if ($length <= 5) {
		$rating += 1;
	} elseif ($length > 5 && $length <= 10) {
		$rating += 2;
	} elseif ($length > 10 && $length <= 15) {
		$rating += 3;
	} else {
		$rating += 4;
	}

	if (filter_var($pass, FILTER_SANITIZE_NUMBER_INT)) $rating += 1;

	if (preg_replace('/[^a-z]/', '', $pass)) $rating += 1;

	if (preg_replace('/[^A-Z]/', '', $pass)) $rating += 1;


	$symbols = ['!','@','#','%','^','?','*','(',')','-','+'];
	for ($i=0; $i < count($symbols); $i++) { 
		if (strpos($pass, $symbols[i]) !== false) {
			$rating += 1;
			break;
		}
		
	}

	



	return $rating;
}










?>