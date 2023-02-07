<?php
//Воспользовавшись наработками по TaskProvider **из практического задания прошлого урока выполните доработку функционала. Адаптируйте механику метода **addTask для сохранения задач в БД. Также, обновите код метода getUndoneList, для получения невыполненных задач из базы данных;
class TaskProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUndoneList(User $user):array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE isDone = 0 AND userId = :id'
        );

        $statement->execute([
            'id' => $user->getId(),
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function getDoneList(User $user): array
    {
        $statement = $this->pdo->prepare(
            'SELECT * FROM tasks WHERE isDone = 1 AND userId = :id'
        );

        $statement->execute([
            'id' => $user->getId(),
        ]);

        return $statement->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, Task::class);
    }

    public function addTask(User $user ,Task $task): bool
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO tasks (userId, description) VALUES (:userId, :description)'
        );

        return $statement->execute([
            'userId' => $user->getId(),
            'description' => $task->getDescription(),
        ]);
    }

    public function doneTask(User $user ,int $id): bool
    {
        $statement = $this->pdo->prepare(
            'UPDATE tasks SET isDone = 1 WHERE id = :id AND userId = :userId'
        );
        return $statement->execute([
            'userId' => $user->getId(),
            'id' => $id,
        ]);
    }

    public function deleteTask(User $user , int $id): bool
    {
        $statement = $this->pdo->prepare(
            'DELETE FROM tasks WHERE id = :id AND userId = :userId'
        );
        return $statement->execute([
            'userId' => $user->getId(),
            'id' => $id,
        ]);
    }
}
