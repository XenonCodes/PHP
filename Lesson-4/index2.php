<?php

//2)Разработайте функцию с объявленными типами аргументов и возвращаемого значения, принимающую в качестве аргумента массив целых чисел. Результатом работы функции должен быть массив, содержащий три элемента: max — наибольшее число, min — наименьшее число, avg — среднее арифметическое всех чисел массива;

//init
$randomArr = [];

function sumArr ( array $arr):int
{
    $result = 0;
    foreach ( $arr as $item) $result += $item;
    return $result;
}

function avg (array $arr):int 
{
    return sumArr($arr) / count($arr);
}

function userFn ( array $arr):array
{
    $result = [];
    $result["max"] = max($arr);
    $result["min"] = min($arr);
    $result["avg"] = avg($arr);
    return $result;
}

//input data
while( !$counterUser = (int)readline("Сколько сгенерировать чисел? ") ) {
    echo "Введите натуральное число!\n";
}

//main logic
for($i = 0; $i < $counterUser; $i++) {
    $randomArr [] = rand(-100,100);
}



//output data
echo "\nГотовый массив:\n";
print_r(userFn($randomArr));
echo "\nМассив чисел:\n";
print_r($randomArr);