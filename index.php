<?php
    //input data
    $nameUser = readline("Введите Ваше Имя: ");
    define("ASK_TIME", "Сколько примерно времени эта задача займет? ");
    $task1 = readline("Какая первая задача стоит перед вами сегодня? ");
    $time1 = readline(ASK_TIME);
    $task2 = readline("Какая вторая задача стоит перед вами сегодня? ");
    $time2 = readline(ASK_TIME);
    $task3 = readline("Какая третья задача стоит перед вами сегодня? ");
    $time3 = readline(ASK_TIME);

    //main logic
    $totalTime = $time1 + $time2 + $time3;
    $result = <<<HERE
    {$nameUser}, сегодня у вас запланировано 3 приоритетных задачи на день: 
    - {$task1} ({$time1}ч)
    - {$task2} ({$time2}ч)
    - {$task3} ({$time3}ч)
    Примерное время выполнения плана = {$totalTime}ч
    HERE;

    //output data
    echo $result;