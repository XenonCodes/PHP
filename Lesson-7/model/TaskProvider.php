<?php
//Воспользовавшись наработками по TaskProvider **из практического задания прошлого урока выполните доработку функционала. Адаптируйте механику метода **addTask для сохранения задач в БД. Также, обновите код метода getUndoneList, для получения невыполненных задач из базы данных;
class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUndoneList():array
    {
        //ДОРАБТАТЬ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE isDone = 0 AND userId = :id'
        );

        $statement->execute([
            'id' => $_SESSION['user_id'],
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function getDoneList(): array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE isDone = 1 AND userId = :id'
        );

        $statement->execute([
            'id' => $_SESSION['user_id'],
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function addTask(Task $task): bool
    {
        //ДОРАБТАТЬ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (userId, description) VALUES (:userId, :description)'
        );

        return $statement->execute([
            'userId' => $_SESSION['user_id'],
            'description' => $task->getDescription(),
        ]);
    }

    public function doneTask(int $id): bool
    {
        //ДОРАБТАТЬ!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        $statement = $this->pdo->prepare(
            'UPDATE tasks SET isDone = 1 WHERE id = :id AND userId = :userId'
        );
        return $statement->execute([
            'userId' => $_SESSION['user_id'],
            'id' => $id,
        ]);
    }

    public function deleteTask(int $id): bool
    {
        // $DBH->exec("DELETE FROM `students` WHERE id = 4");
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id AND userId = :userId'
        );
        return $statement->execute([
            'userId' => $_SESSION['user_id'],
            'id' => $id,
        ]);
    }
}
