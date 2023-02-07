<?php

require_once 'User.php';

class UserProvider
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function checkUser(User $user): ?string
    {
        $login = $user->getUserName();
        $sql = "SELECT userName FROM users WHERE userName = '$login'";
        $statement = $this->pdo->query($sql);
        if ($statement->fetchAll()) {
            return "Пользователь с таким логином уже существует.";
        } else return null;
    }

    public function regUser(User $user, string $plainPassword): int
    {
        $statement = $this->pdo->prepare(
            'INSERT INTO users (name, userName, password) VALUES (:name, :userName, :password)'
        );

        $statement->execute([
            'name' => $user->getName(),
            'userName' => $user->getUserName(),
            'password' => md5($plainPassword)
        ]);

        return $this->pdo->lastInsertId();
    }

    public function getByUserNameAndPassword(string $userName, string $password): ?User
    {
        $statement = $this->pdo->prepare(
            'SELECT id, name, userName FROM users WHERE userName = :userName AND password = :password LIMIT 1'
        );
        $statement->execute([
            'userName' => $userName,
            'password' => md5($password)
        ]);
        return $statement->fetchObject(User::class, [$userName]) ?: null;
    }
}
