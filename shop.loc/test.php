<?php 

$dsn = "mysql:host=localhost;port=3306;dbname=store_db;charset=utf8";
$pdo = new PDO($dsn, 'store', 'store');

$stmtUserId = $pdo->query("SELECT id FROM users ORDER BY id LIMIT 1");

$userId = $stmtUserId->fetch(PDO::FETCH_ASSOC);

var_dump($userId);

?>