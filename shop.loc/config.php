<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

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

spl_autoload_register(function ($className) {
	$className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strrpos($className, '\\')) {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
        $fileName  = "/class/" . str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
    }
    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

    require(ROOT_PATH . $fileName);
});


$connect = Shop\DB::connect(DB_NAME, DB_USER, DB_PASS);



?>