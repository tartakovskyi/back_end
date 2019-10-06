<?php 

/*ini_set('max_execution_time', 2);
   set_time_limit(2);*/
  $begin = microtime();
  $i = 1;
  while ($i <= 10000) {
  	 echo 'test';
  	 $i++;
  }
  $end = microtime();
  echo '<br>';
  echo $end - $begin;
