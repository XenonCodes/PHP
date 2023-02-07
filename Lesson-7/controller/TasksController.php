<?php

require_once 'model/User.php';
require_once 'model/Task.php';
require_once 'model/TaskProvider.php';

session_start();

// echo "<pre style='text-align: left'>";
// print_r($_SESSION);
// print_r($_REQUEST);
// echo "</pre>";

$pageHeader = 'Задачи';

$pdo = require 'db.php';
$userName = null;

if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $userName = $user->getName();
} else {
    header("Location: /");
    die();
}

$taskProvider = new TaskProvider($pdo);

if(isset($_GET['action']) && $_GET['action'] == 'add') {
    $taskProvider->addTask($user, new Task($_POST['task']));
    header("Location: /?controller=tasks");
    die();
}

if(isset($_GET['action']) && $_GET['action'] == 'done') {
    $key = $_GET['key'];
    $taskProvider->doneTask($user, $key);
    header("Location: /?controller=tasks");
    die();
}

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    $key = $_GET['key'];
    $taskProvider->deleteTask($user, $key);
    header("Location: /?controller=tasks");
    die();
}

$tasksUndone = $taskProvider->getUndoneList($user);
$tasksDone = $taskProvider->getDoneList($user);


require "view/tasks.php";
