<?php 

define("PATH", "/var/www/site.loc/files/");

$passString = $_POST['name'].' '.$_POST['pass'];

$passwords = fopen(PATH.'passwords.txt', "r");

$access = false;

while (!feof($passwords)) {
	$string = fgets($passwords);

	if ($passString === trim($string)) {
		$access = true;
		$userFile = fopen(PATH.$_POST['name'].'.txt', "c+");
		$count = fgets($userFile);
		if(isset($count)) {
			$count += 1;
		} else {
			$count = 1;
		}
		rewind($userFile);
		fwrite($userFile, $count);
		fclose($userFile);
		echo "Доступ разрешен. Количество посещений: ".$count ;
		break;
	}
}

if (!$access) echo "Доступ запрещен";

?>


