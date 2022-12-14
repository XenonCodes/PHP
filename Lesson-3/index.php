<?php

//1)Подготовьте два массива одинаковой размерности, но не менее 10 элементов, с произвольными числовыми значениями. Разработайте скрипт для запуска из командной строки, выполняющий перемножение элементов двух массивов и выводящий результат в консоль с помощью print_r. Умножение должно выполняться только между элементами соответствующих индексов, то есть нулевой элемент первого массива умножается на нулевой элемент второго массива;

//init
$arr1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$arr2 = [2, 3, 4, 5, 6, 7, 8, 9, 10, 11];
$result = [];

//main logic
for($i = 0; $i < count($arr1); $i++) {
    $result[] = $arr1[$i] * $arr2[$i];
}

//output data
print_r($result);

//------------------------------------------------------------------------------------------------------------------
//2)Разработайте скрипт для запуска из командной строки, генерирующий персонализированные поздравления с днём рождения. Подготовьте два массива: в первом храните пожелания (счастья, здоровья и т.д.), во втором эпитеты (бесконечного, крепкого и т.д.). При запуске запросите имя именинника и после ввода сгенерируйте текст поздравления, включающий три пожелания. Комбинации эпитетов и пожеланий должны быть случайными. В результате необходимо получить строку, по следующему примеру:  «Дорогой Илон Маск, от всего сердца поздравляю тебя с днем рождения, желаю космического терпения, бесконечного здоровья и безудержного воображения!». Для реализации используйте функции array_rand и implode;

//init
$wishes = ["счастья", "здоровья", "терпения", "воображения", "веселья"];
$epithets = ["космического", "бесконечного", "безудержного", "пламенного"];
$result = [];
$end = "";

//input data
$userName = readline("Как вас зовут? ");

//main logic
for ($i = 0; $i < 3; $i++) {
    if($i < 2) {
    $result[] = $epithets[array_rand($epithets, 1)] . " " . $wishes[array_rand($wishes, 1)];
    } else {
        $end .= $epithets[array_rand($epithets, 1)] . " " . $wishes[array_rand($wishes, 1)];
    }
}
$str = implode(", ", $result);

//output data
echo "Дорогой {$userName}, от всего сердца поздравляю тебя с днем рождения, желаю {$str} и {$end}!";