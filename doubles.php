<?php
$array = array();
for ($i = 0; $i < 100; $i++) {
    $array[]=rand(1,99);
}
$new = array();

foreach ($array as $value)
{
    if (isset($new[$value]))
        $new[$value]++;
    else
        $new[$value] = 1;
}
print_r($new);
// 2 Метод
//print_r(array_count_values($array));
?>
