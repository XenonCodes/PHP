<?php

//init
echo "
В каком году произошло крещение Руси?
Варианты: 810, 990 или 740 год.
";
$rightAnswer = 990;
$result = "";

//input data
$answer = (int)readline("");

//main logic

while ($answer != $rightAnswer && $answer != 810 && $answer != 740 ) {
    $answer = (int)readline("Вы ввели ответ не входящим в перечень, повторите ввод: ");
}

switch ($answer) {
    case $rightAnswer:
        $result = "Поздравляем вы угадали!";
        break;
    case 810:
    case 740:
        $result = "Вы не угадали.";
        break;
}

//output data
echo $result;