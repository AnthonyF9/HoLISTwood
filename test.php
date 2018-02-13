<?php
$str = '0000000111111122222223333333444444455555556666666777777788888889999999';
for ($i=0; $i < 10; $i++) {
  $shuffle = str_shuffle($str);
  $short_shuffle = substr($shuffle,1,6);
  echo $imdb_new = 'tt0'.$short_shuffle;
  echo '<br/>';
}
$a = 'dsfdEpisodefg #1.8788';
$b = stristr($a,'Episode');
echo $b;
echo '<br/>';
$c = explode('Episode',$a);
echo '<pre>'.print_r($c).'</pre>';
echo '<br/>';
$d = strpos($a,'Episode');
if ($d != false) {
  echo $d;
}
else {
  echo 'Oh oh';
}
