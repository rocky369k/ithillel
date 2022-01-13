<?php

function database_connect(): PDO
{
    // Хост:        127.0.0.1
    // Порт:        3306
    // База данных: default
    // Кодировка:   utf8
    $source = 'mysql:host=127.0.0.1;port=3306;dbname=default;charset=utf8';

    $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES => false,
    ];

    return new PDO($source, 'root', 'root', $options);
}
