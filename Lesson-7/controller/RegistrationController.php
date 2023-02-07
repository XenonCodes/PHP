<?php

require_once 'model/UserProvider.php';

session_start();

// echo "<pre style='text-align: left'>";
// print_r($_SESSION);
// print_r($_REQUEST);
// echo "</pre>";

$pageHeader = 'Регистрация';

$pdo = require 'db.php';
$error = null;

if ($_POST['password'] !== $_POST['password_check']) {
    $error = 'Пароль не совпадают!';
}

if (isset($_POST['username'], $_POST['name'], $_POST['password']) && ($_POST['password'] == $_POST['password_check'])) {
    ['username' => $userName, 'name' => $name, 'password' => $password] = $_POST;

    $user = new User($userName);
    $user->setName($name);
    $userProvider = new UserProvider($pdo);

    if ($userProvider->checkUser($user)) {
        $error = $userProvider->checkUser($user);
    } else {
        $user->setId($userProvider->regUser($user, $password));

        $_SESSION['username'] = $user;
        $_SESSION['user_id'] = $user->getId();
        header("Location: /");
        die();
    }
}

if (isset($_SESSION['username'])) {
    header("Location: /");
    die();
}

require "view/registration.php";
