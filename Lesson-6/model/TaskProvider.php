<?php

class TaskProvider
{
    private array $tasks;

    public function __construct()
    {
        $this->tasks = $_SESSION['tasks'] ?? [];
    }

    public function getUndoneList(): array
    {
        $undoneTasks = [];

        foreach ($this->tasks as $key => $Task) {
            if (!$Task->getIsDone()) {
                $undoneTasks[$key] = $Task;
            }
        }

        return $undoneTasks;
    }

    public function getDoneList(): array
    {
        $doneTasks = [];

        foreach ($this->tasks as $key => $Task) {
            if ($Task->getIsDone()) {
                $doneTasks[$key] = $Task;
            }
        }

        return $doneTasks;
    }

    public function addTask(Task $task):void
    {
        $_SESSION['tasks'][] =  $task;
        $this->tasks[] = $task;
    }

    public function doneTask(int $key):void
    {
        $this->tasks[$key]->markAsDone();
    }

    public function deleteTask(int $key):void
    {
        unset($_SESSION['tasks'][$key]);
        unset($this->tasks[$key]);
    }
}