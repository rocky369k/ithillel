<?php

session_start();

require_once __DIR__ . '/../includes/errors.php';
require_once __DIR__ . '/../includes/database.php';

if (empty($_POST['email'])) {
    set_error_message('Поле <b>E-mail</b> обязательно для заполнения.');
    header('Location: /register.php');
    exit;
}

if (empty($_POST['password'])) {
    set_error_message('Поле <b>Пароль</b> обязательно для заполнения.');
    header('Location: /register.php');
    exit;
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    set_error_message('Неверный формат e-mail.');
    header('Location: /register.php');
    exit;
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$name = trim(strip_tags(htmlspecialchars($_POST['name'], ENT_QUOTES | ENT_HTML5))) ?: null;

$database = database_connect();

$statement = $database->prepare('SELECT `id` FROM `users` WHERE `email` = :email');

$statement->execute(['email' => $email]);

if ($statement->rowCount()) {
    set_error_message('Пользователь с таким e-mail уже существует.');
    header('Location: /register.php');
    exit;
}

$statement = $database->prepare(
    'INSERT INTO `users` (`email`, `password`, `name`) VALUES (:email, :password, :name)'
);

$statement->execute([
    'email' => $email,
    'password' => $password,
    'name' => $name,
]);


header('Location: /login.php');
