<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title><?= $pageHeader ?></title>
    <style>
        body {
            text-align: center;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }

        h1 {
            color: #333;
            margin-top: 50px;
        }

        a {
            color: #1c87c9;
            text-decoration: none;
        }

        p {
            font-size: 30px;
            line-height: 1.5;
            color: #333;
            margin: 20px 0;
            text-align: justify;
        }

        #menu {
            margin-top: 30px;
            display: inline-block;
        }

        .text {
            font-size: 17px;
            width: 600px;
            margin: auto;
        }

        .menu-item {
            display: inline-block;
            padding: 10px 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1);
            margin-right: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease-in-out;
        }

        .menu-item:hover {
            transform: translateY(-2px);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .menu-item:active {
            transform: translateY(2px);
            box-shadow: none;
        }

        .exit {
            display: inline-block;
            padding: 10px 20px;
            background-color: #363434;
            color: #fff;
            border: none;
            border-radius: 4px;
            text-align: center;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease-in-out;
        }

        .exit:hover {
            transform: translateY(-2px);
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.2);
        }

        .exit:active {
            transform: translateY(2px);
            box-shadow: none;
        }
    </style>
</head>

<body>

    <h1><?= $pageHeader ?></h1>

    <div id="menu">
        <?php require "menu.php" ?>
    </div>

    <hr>

    <p class="text">Итоговый проект по PHP. Это был сложный, но полезный опыт создания этого финального проекта. Я горжусь результатом и с нетерпением жду возможности применить свои знания в будущих начинаниях.
        <br>
        <br>Xenon K. o7
    </p>

</body>

</html>