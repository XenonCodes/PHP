<?php

require 'model/User.php';
require 'model/UserProvider.php';
require 'model/Task.php';
require 'model/TaskProvider.php';

session_start();

// echo "<pre>";
// print_r($_SESSION);
// print_r($_REQUEST);
// echo "</pre>";

$pageHeader = 'Задачи';

$userName = null;
if (isset($_SESSION['username'])) {
    $user = $_SESSION['username'];
    $userName = $user->getUserName();
} else {
    header("Location: /");
    die();
}

$taskProvider = new TaskProvider();

if(isset($_GET['action']) && $_GET['action'] == 'add') {
    $taskText = strip_tags($_POST['task']);
    $taskProvider->addTask(new Task($taskText));
    header("Location: /?controller=tasks");
    die();
}

if(isset($_GET['action']) && $_GET['action'] == 'done') {
    $key = $_GET['key'];
    $taskProvider->doneTask($key);
    header("Location: /?controller=tasks");
    die();
}

if(isset($_GET['action']) && $_GET['action'] == 'delete') {
    $key = $_GET['key'];
    $taskProvider->deleteTask($key);
    header("Location: /?controller=tasks");
    die();
}

$tasksUndone = $taskProvider->getUndoneList();
$tasksDone = $taskProvider->getDoneList();


require "view/tasks.php";
