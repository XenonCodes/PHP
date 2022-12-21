<?php
define("ASK_TIME", "Сколько примерно времени эта задача займет? ");
define("ASK_TASK", "Какая задача стоит перед вами сегодня? ");

//init
$totalTime = 0;
$result = "";

//input data
$nameUser = readline("Введите Ваше Имя: ");

do {
    $quantity = readline("Какое количество задач нужно выполнить сегодня? ");
} while ($quantity <= 0);

//main logic
for($i = 0; $i < $quantity; $i++) {
    $task = readline(ASK_TASK);
    $time = (int)readline(ASK_TIME);

    $totalTime += $time;

    $result .= "- {$task} ({$time}ч)\n";
}

//output data
echo "{$nameUser}, сегодня у вас запланировано {$quantity} приоритетных задачи на день: \n";
echo $result;
echo "Примерное время выполнения плана = {$totalTime}ч";