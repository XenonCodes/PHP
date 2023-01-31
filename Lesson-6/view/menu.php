<?php if ($userName !== null) : ?>
    <a href="/">Главная</a>
    <a href="/?controller=tasks">Задачи</a>
    <br>
    <p>Рады вас приветствовать, <?= $userName ?>. <a href="/?controller=security&logout"> [Выход]</a></p>
<?php else : ?>
    <a href="/">Главная</a>
    <a href="/?controller=security">Войти</a>
<?php endif; ?>