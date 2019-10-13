<?php 
$users = [
  '2' => ['name' => 'Иван', 'email' => 'test@test.ru', 'lang' => 'ru'],
  '5' => ['name' => 'John', 'email' => 'test@test.com', 'lang' => 'en'],
  '7' => ['name' => 'Павло', 'email' => 'test@test.ua', 'lang' => 'uk'],
  '8' => ['name' => 'James', 'email' => 'test2@test.com', 'lang' => 'en'],
  '9' => ['name' => 'Петро', 'email' => 'test3@test.ua', 'lang' => 'uk'],
  '10' => ['name' => 'Павло', 'email' => 'test4@test.ua', 'lang' => 'uk'],
  '11' => ['name' => 'Павло', 'email' => 'test5@test.ua', 'lang' => 'uk']
];

/*foreach ($users as $user) {
  $name = $user['name'];
  $names[$name] += 1;
}
foreach ($names as $key => $val) {
   echo $key.' = '.$val.'<br>';
 } */


/*foreach ($users as $user) {
  $lang = $user['lang'];
  $languages[$lang][] = $user;
}
extract($languages);*/

$usersNew = [];
foreach ($users as $user) {
array_unshift($usersNew, $user);
}


