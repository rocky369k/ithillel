<?php
$array = array();
for ($i = 0; $i < 10; $i++) {
    $array[]=rand(1,99);
}
print_r($array);
$max = $array[array_first_key($array)];
foreach ($array as $index => $value) {
  if($value <= max){
    continue;
  }
  $max = $value;
}
echo $max;
echo PHP_EOL;
//echo PHP_EOL;
//echo max($array);
//echo PHP_EOL;
//echo "Min:";
//echo min($array);
// Метод решения функциями массива
?>
