<?php 

require_once("config.php");

$id = $_GET['id'];

$cat = new Shop\Category($id);

$info = $cat->getCategoryInfo();

$pageTitle = $info['name'];
$metaTitle = ($info['title']) ?? $info['name'];
$pageImg = '/img/category/'. $info['picture'];

require_once(ROOT_PATH."/templates/header.php");



 ?>