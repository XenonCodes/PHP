<?php

include 'model/User.php';
include 'model/UserProvider.php';

$pdo = require 'db.php';

$pdo->exec('CREATE TABLE users (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    name VARCHAR(150),
    userName VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL
)');

$pdo->exec('CREATE TABLE tasks (
    id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
    userId INTEGER NOT NULL,
    description VARCHAR(150) NOT NULL,
    isDone TINYINT DEFAULT (0)
)');

$user = new User('admin');
$user->setName('GeekBrains PHP');
$user2 = new User('root');
$user2->setName('root');

$userProvider = new UserProvider($pdo);
$userProvider->regUser($user, '123');
$userProvider->regUser($user2, 'root');
