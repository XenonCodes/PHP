<?php if ($userName) : ?>
    Добро пожаловать <?= $userName ?><a href="?logout"> Выход</a>
    <br>
    <a href="/">Главная</a>
    <a href="./shop.php">Покупки</a>
<?php else : ?>
    <form method="post">
        <input type="text" name="username" placeholder="Логин admin">
        <input type="text" name="password" placeholder="Пароль 123">
        <input type="submit" value="Вход">
    </form>
<?php endif; ?>