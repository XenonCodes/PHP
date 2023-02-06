<?php

require_once 'model/UserProvider.php';

session_start();

echo "<pre style='text-align: left'>";
print_r($_SESSION);
print_r($_REQUEST);
echo "</pre>";

$pageHeader = 'Авторизация';

$pdo = require 'db.php';
$error = null;

if (isset($_POST['username'], $_POST['password'])) {
    ['username' => $userName, 'password' => $password] = $_POST;
    $userProvider = new UserProvider($pdo);
    $user = $userProvider->getByUserNameAndPassword($userName, $password);
    if ($user === null) {
        $error = 'Пользователь с указанными данными не найден!';
    } else {
        $_SESSION['username'] = $user;
        $_SESSION['user_id'] = $user->getId();
        header("Location: /");
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
