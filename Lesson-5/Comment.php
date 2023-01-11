<?php

//2)Реализуйте два класса: Comment и TaskService. Comment должен содержать свойства author (User), task (Task) и text (string). TaskService должен реализовывать статичный метод addComment(User, Task, text), добавляющий к задаче комментарий пользователя. Отношение между классами задачи и комментария должны быть построены по типу ассоциация, поэтому необходимо добавить соответствующее свойство и методы классу Task.
class Comment
{
    private User $author;
    private Task $task;
    private string $text;

    public function __construct(User $author, Task $task, string $text)
    {
        $this->author = $author;
        $this->task = $task;
        $this->text = $text;
    }
    //---------------------GET------------------------------
    public function getAuthor(): User
    {
        return $this->author;
    }

    public function getTask(): Task
    {
        return $this->task;
    }

    public function getText(): string
    {
        return $this->text;
    }
    //---------------------SET------------------------------
    public function setAuthor(User $author): void
    {
        $this->author = $author;
    }

    public function setTask(Task $task): void
    {
        $this->task = $task;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }
}