<?php

//1)Подготовьте массив целых чисел (4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2). Разработайте анонимную функцию для применения в качестве аргумента array_map, возвращающую для каждого элемента массива строковое значение: «четное» или «нечетное». Для проверки четности числа используйте деление по модулю (%);

//init
$randomArr = [];

//input data
while( !$counterUser = (int)readline("Сколько сгенерировать чисел? ") ) {
    echo "Введите натуральное число!\n";
}

//main logic
for($i = 0; $i < $counterUser; $i++) {
    $randomArr [] = rand(0,500);
}

$result = array_map(fn(int $item):string => $item & 1 ? "Нечетное" : "Четное", $randomArr );

//output data
echo "\nМассив чисел:\n";
print_r($randomArr);
echo "\nМассив результата:\n";
print_r($result);