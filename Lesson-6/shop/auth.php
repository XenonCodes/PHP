<?php
session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

$userName = NULL;

if (isset($_POST['username'])) {
    $userName = strip_tags($_POST['username']);
    $pass = $_POST['password'] ?? NULL;
    if ($userName == 'admin' && $pass == 123) {
        //setcookie('username', $userName, time() + 35000, '/'); //Вариант coockie
        $_SESSION['username'] = $userName; //Вариант session
        header('Location: /');
        die();
    } else {
        die("Не верный пароль или логин!");
    }
}

if (isset($_SESSION['username'])) {
    $userName = $_SESSION['username'];
}

if (isset($_REQUEST['logout'])) {
    //setcookie('username');
    unset($_SESSION['username']);
    session_destroy();
    header('Location: /');
    die();
}
