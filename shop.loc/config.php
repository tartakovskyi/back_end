<?php
header('Content-Type: text/html; charset=utf-8'); 

if(!isset($_SESSION)) {
	session_start();
}
define('ROOT_PATH', 'http://store.loc');
define('IMG_PATH', '/img/');

/*define('HOST', 'localhost');
define('DB_NAME', 'store_db');
define('DB_USER', 'store');
define('DB_PASS', 'store');*/ 

$dsn = "mysql:host=localhost;port=3306;dbname=store_db;charset=utf8";
$pdo = new PDO($dsn, 'store', 'store');


?>