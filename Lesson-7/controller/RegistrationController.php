<?php

require_once 'model/UserProvider.php';

session_start();

echo "<pre style='text-align: left'>";
print_r($_SESSION);
print_r($_REQUEST);
echo "</pre>";

$pageHeader = 'Регистрация';

$pdo = require 'db.php';
$error = null;

if ($_POST['password'] !== $_POST['password2']) {
    $error = 'Пароль не совпадают!';
}

if (isset($_POST['username'], $_POST['name'], $_POST['password']) && ($_POST['password'] == $_POST['password2'])) {
    ['username' => $userName, 'name' => $name, 'password' => $password] = $_POST;

    $user = new User($userName);
    $user->setName($name);
    $userProvider = new UserProvider($pdo);

    $user->setId($userProvider->regUser($user, $password));
    
    $_SESSION['username'] = $user;
    $_SESSION['user_id'] = $user->getId();
    header("Location: /");
    die();
}

if (isset($_SESSION['username'])) {
    header("Location: /");
    die();
}

require "view/registration.php";
