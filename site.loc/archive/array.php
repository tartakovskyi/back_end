<?php 
$users = [
	['name' => 'Иван', 'email' => 'test@rest.ru', 'lang' => 'ru'],
	['name' => 'John', 'email' => 'test@rest.com', 'lang' => 'en'],
	['name' => 'Павло', 'email' => 'test@rest.a', 'lang' => 'uk']
];

$hello = ['ru' => 'Привет', 'en' => 'Hello', 'uk' => 'Привіт'];

$first = current($users);
$last = end($users);

echo $hello[$first['lang']].', '.$first['name'];

if ($first['lang'] != $last['lang']) {
	echo '<br>'.$hello[$last['lang']].', '.$last['name'];
}

