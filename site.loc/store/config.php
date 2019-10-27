<?php
header('Content-Type: text/html; charset=utf-8'); 

if(!isset($_SESSION)) {
     session_start();
}
define('ROOT_PATH', 'http://site.loc/store/');
define('IMG_PATH', ROOT_PATH.'/img/');

define('HOST', 'localhost');
define('DB_NAME', 'store_db');
define('DB_USER', 'store');
define('DB_PASS', 'store');

 ?>