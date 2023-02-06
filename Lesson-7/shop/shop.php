<?php
require "auth.php";

if (is_null($userName)) {
    header('Location: /');
    die();
}

if (isset($_POST['text'])) {
    $task = strip_tags($_POST['text']);
    $_SESSION['shop'][] = $task;
    header('Location: shop.php');
    die();
}

if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $key = $_GET['key'];
    unset($_SESSION['shop'][$key]);
    header('Location: shop.php');
    die();
}

$shop = $_SESSION['shop'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <!-- <?php require "menu.php" ?> -->

    <h2>Ваши покупку</h2>
    <form method="post">
        <input type="text" name="text" placeholder="Добавить покупку">
        <input type="submit" value="Добавить">
    </form>
    <?php if (!empty($shop)) : ?>
        <?php foreach ($shop as $key => $text) : ?>
            * <?= $text ?><a href="?action=delete&key=<?= $key ?>"> X</a><br>
        <?php endforeach; ?>
    <?php else : ?>
        Нет покупок
    <?php endif; ?>
    <br>
</body>

</html>