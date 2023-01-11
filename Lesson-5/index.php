<?php

require "User.php";
require "Task.php";
require "Comment.php";
require "TaskService.php";

$user1 = new User("Dmitiy.S", "Sherbakov.DAl@gaz-neft.ru", 31, "man");
$user2 = new User("Pavel.C", "Sherbakov.DAl@gaz-neft.ru", 31, "man");
$task1 = new Task($user1); //описание и приоритет будут по default

echo $task1->getDescription().PHP_EOL;
echo $task1->getDate("dateCreated").PHP_EOL;
echo $task1->getDate("dateUpdated").PHP_EOL;
echo $task1->getDate("dateDone").PHP_EOL;

$ask = readline("Тянем время чтобы была разница между созданием и изменением....(просто нажмите ENTER)");

$task1->setDescription("Совсем новое описание");
echo $task1->getDescription().PHP_EOL;

$task1->markAsDone();
echo $task1->getDate("dateUpdated").PHP_EOL;
echo $task1->getDate("dateDone").PHP_EOL;

TaskService::addComment($user1, $task1, "Первый коментарий");
TaskService::addComment($user2, $task1, "Второй коментарий");

echo "Вывод комментариев:".PHP_EOL;

foreach ($task1->getComments() as $comment){
    echo $comment->getText(). ". Комментарий оставил ". $comment->getAuthor()->getUserName() .PHP_EOL;
}



//echo gettype($task1).PHP_EOL; //показать тип
//echo $task1->getUser()->getUserName(); //цепочка