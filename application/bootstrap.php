<?php

// подключаем файлы ядра
require_once 'core/model.php';
require_once 'core/view.php';
require_once 'core/controller.php';
require_once 'core/route.php';

// подключаемся к БД
require_once $_SERVER['DOCUMENT_ROOT'] . '/newsModule/pdoconfig.php';
$db = new PDO('mysql:host='.$pdoconfig['host'].';dbname='.$pdoconfig['dbname'], $pdoconfig['username'], $pdoconfig['password']);

// запускаем маршрутизатор
Route::start();