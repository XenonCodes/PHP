<?php if ($userName) : ?>
    <a href="/" class="menu-item">Главная</a>
    <a href="/?controller=tasks" class="menu-item">Задачи</a>
    <br>
    <p>Рады вас приветствовать вас, <?= $userName ?>. <a href="/?controller=security&logout" class="exit"> Выход</a></p>
<?php else : ?>
    <a href="/" class="menu-item">Главная</a>
    <a href="/?controller=security" class="menu-item">Войти</a>
    <a href="/?controller=registr" class="menu-item">Зарегистрироваться</a>
<?php endif; ?>