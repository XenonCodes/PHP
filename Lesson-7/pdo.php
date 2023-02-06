<?php

// $DBH = new PDO("sqlite:database.db", null, null, [
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
// ]);

//Создание БД-------------------------------------------------------------
// $query = 'CREATE TABLE `students` (
//     id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,

//     name VARCHAR(100) NOT NULL
// )';

// $statement = $DBH->query($query);

//Добавление записи в таблицу students ------------------------------------
// $studentName = "Иванов Иван";
// $affectedCount = $DBH->exec("INSERT INTO `students` (`name`) VALUES ('$studentName')");
// var_dump($affectedCount);
//+++++++++++++++++++++++++++++++++++
// $studentName = "Васек";
// $STH = $DBH->prepare("INSERT INTO `students` (`name`) VALUES (:name)");
// $STH->execute([
//     'name' => $studentName,
// ]);

//Удаление из базы данных записи--------------------------------------------
// $DBH->exec("DELETE FROM `students` WHERE id = 4");

//Изменения записи в базе данных--------------------------------------------
// $DBH->exec("UPDATE students SET name = 'Neo' WHERE id = 2");

//Получение данных из БД ---------------------------------------------------
// $statement = $DBH->query('SELECT * FROM students');
// echo "<pre>";
// print_r($statement->fetchAll());



// var_dump($DBH);
