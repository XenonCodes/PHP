<?php

require 'model/User.php';
require 'model/UserProvider.php';

session_start();

// echo "<pre>";
// print_r($_SESSION);
// print_r($_REQUEST);
// echo "</pre>";

$pageHeader = 'Добро пожаловать';

$userName = null;
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $userName = $user->getUserName();
}

require "view/index.php";