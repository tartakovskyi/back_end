<?php 


require_once("config.php");

$id = $_GET['id'];

var_dump($id);

$cat = new Shop\Category($id);

echo $cat->ID;


 ?>