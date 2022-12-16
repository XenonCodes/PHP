<?php

//init
$count = 1;
$totalTime = 0;

define("ASK_TIME", "Сколько примерно времени эта задача займет? ");
define("ASK_TASK", "Какая задача стоит перед вами сегодня? ");

//input data
$nameUser = readline("Введите Ваше Имя: ");

do {
    $quantity = readline("Какое количество задач нужно выполнить сегодня? ");
} while ($quantity <= 0);

//main logic
$result = "{$nameUser}, сегодня у вас запланировано {$quantity} приоритетных задачи на день: \n";

for($i = 0; $i < $quantity; $i++) {
    $task = "task{$count}";
    $time = "time{$count}";

    $$task = readline(ASK_TASK);
    $$time = (int)readline(ASK_TIME);

    $totalTime += $$time;

    $result .= "- {$$task} ({$$time}ч)\n";

    $count++;
}

$result .= "Примерное время выполнения плана = {$totalTime}ч";

//output data
echo $result;