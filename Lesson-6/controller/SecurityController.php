<?php

require 'model/User.php';
require 'model/UserProvider.php';

session_start();

// echo "<pre>";
// print_r($_SESSION);
// print_r($_REQUEST);
// echo "</pre>";

$pageHeader = 'Авторизация';

$error = null;

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $userName, 'password' => $password] = $_POST;
    $userProvider = new UserProvider();
    $user = $userProvider->getByUserNameAndPassword($userName, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными данными не найден!';
    } else {
        $_SESSION['username'] = $user;
        header("Location: index.php");
        die();
    }
}

if (isset($_REQUEST['logout'])) {
    unset($_SESSION['username']);
    session_destroy();
    header('Location: /');
    die();
}

if (isset($_SESSION['username'])) {
    header("Location: /");
    die();
}

// if (isset($_GET['action']) && $_GET['action'] === 'logout') {
//     unset ($_SESSION['username']);
//     session_destroy();
// }

require "view/signin.php";
