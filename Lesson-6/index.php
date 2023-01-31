<?php

$controller = $_GET['controller'] ?? 'index';

$routes = require './router.php';

require $routes[$controller] ?? die('404 Страница не найдена');
