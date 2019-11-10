<?php 
require_once ('config.php');
require_once ('class/cart.php');

$ajax = json_decode(file_get_contents('php://input'), true);

$request = new Cart();

$request->execute($ajax['function'], $ajax['data']);

echo $request->response;




?>


