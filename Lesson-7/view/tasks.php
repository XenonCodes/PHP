<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= $pageHeader ?></title>
    <style>
        body {
            text-align: center;
        }
    </style>
</head>

<body>

    <?php require "menu.php" ?>
    <br>

    <h1><?= $pageHeader ?></h1>

    <form action="/?controller=tasks&action=add" method="post" style="display: flex;justify-content: center;">
        <input type="text" name="task" placeholder="Введите описание задачи" style="line-height: 18px; margin-right: 10px" />
        <button type="submit">🚀</button>
    </form>

    <?php foreach ($tasksUndone as $task) : ?>
        <div>
            <?= $task->getDescription() ?>
            <a href="/?controller=tasks&action=done&key=<?= $task->getId()?>"> ✔️ </a>
        </div>
    <?php endforeach; ?>

    <br>
    <h1>Выполненные задачи</h1>
    <br>

    <?php foreach ($tasksDone as $task) : ?>
        <div>
            <?= $task->getDescription() ?>
            <a href="/?controller=tasks&action=delete&key=<?= $task->getId() ?>"> ❌ </a>
        </div>
    <?php endforeach; ?>

</body>

</html>