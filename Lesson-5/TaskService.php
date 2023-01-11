<?php

//2)Реализуйте два класса: Comment и TaskService. Comment должен содержать свойства author (User), task (Task) и text (string). TaskService должен реализовывать статичный метод addComment(User, Task, text), добавляющий к задаче комментарий пользователя. Отношение между классами задачи и комментария должны быть построены по типу ассоциация, поэтому необходимо добавить соответствующее свойство и методы классу Task.

class TaskService
{
    public static function addComment(User $author, Task $task, string $text): void
    {
        $task->setComment(new Comment($author, $task, $text));
    }
}