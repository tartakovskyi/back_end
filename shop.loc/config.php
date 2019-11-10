<?php
header('Content-Type: text/html; charset=utf-8'); 

if(!isset($_SESSION)) {
	session_start();
}

define("DB_USER", "shop");
define("DB_PASS", "shop");
define("DB_NAME", "shop_db");

define("ROOT_PATH", dirname(__FILE__));
define("SITE_URL", "http://shop.loc");
define('IMG_PATH', '/img/');

require_once(ROOT_PATH."/class/db.php");
DB::connect(DB_NAME, DB_USER, DB_PASS);

//var_dump(ROOT_PATH."/class/db.php");


?>