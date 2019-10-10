<?php 

define("PATH", "/var/www/site.loc/files/");

$passString = $_POST['name'].' '.$_POST['pass'];

$passwords = fopen(PATH.'passwords.txt', "r");

$access = false;

var_dump($passString);

while (!feof($passwords)) {
	$string = fgets($passwords);

	if ($passString === preg_replace('/\n/', '', $string)) {
		echo "Доступ разрешен";
		$access = true;
		break;
	}
}

if (!$access) echo "Доступ запрещен";

?>


