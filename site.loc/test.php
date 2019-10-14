<?php 
$pass = 'dfFF123';
$test = [ctype_upper($pass), ctype_lower($pass), ctype_digit()];
for ($i=0; $i < count($test) ; $i++) { 
print_r($test[$i]);
}








 ?>