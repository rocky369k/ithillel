<?php

session_start();

require_once __DIR__ . '/../includes/errors.php';
require_once __DIR__ . '/../includes/database.php';

if (empty($_POST['email']) || empty($_POST['password'])) {
    set_error_message('Все поля обязательные для заполнения.');
    header('Location: /login.php');
    exit;
}

$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$password = $_POST['password'];

$database = database_connect();

$statement = $database->prepare('SELECT * FROM `users` WHERE `email` = :email');

$statement->execute(['email' => $email]);

$user = $statement->fetch();

if (false === $user) {
    set_error_message('Пользователь ' . $email . ' не найден.');
    header('Location: /login.php');
    exit;
}

if (!password_verify($password, $user['password'])) {
    set_error_message('Неверный пароль.');
    header('Location: /login.php');
    exit;
}


$_SESSION['is_auth'] = true;
$_SESSION['user_id'] = $user['id'];

header('Location: /index_authuser.php');
