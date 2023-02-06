<?php

require_once 'model/User.php';

session_start();

echo "<pre style='text-align: left'>";
print_r($_SESSION);
print_r($_REQUEST);
echo "</pre>";

$pageHeader = 'Добро пожаловать';

$userName = null;
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $userName = $user->getUserName();
}

require "view/index.php";