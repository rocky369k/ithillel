<?php
function camelCase($str) {
    $i = array("-","_");
    $str = preg_replace('/([a-z])([A-Z])/', "\\1 \\2", $str);
    $str = preg_replace('@[^a-zA-Z0-9\-_ ]+@', '', $str);
    $str = str_replace($i, ' ', $str);
    $str = str_replace(' ', '', ucwords(strtolower($str)));
    $str = strtolower(substr($str,0,1)).substr($str,1);
    return $str;

    static $cache = false;

    if ($cache) {
        $data = $cache;
    } else {
        $data = $str;
        $cache = $data;
    }

    $out = $str;

    return $out;
}
echo camelCase('hello_WORLD');
echo PHP_EOL;
echo camelCase('hello world'); // helloWorld
echo PHP_EOL;
echo camelCase('hello-world'); // helloWorld
echo PHP_EOL;
echo camelCase('Hello_World'); // helloWorld
echo PHP_EOL;
echo camelCase('hello world'); // helloWorld
echo PHP_EOL;
?>
