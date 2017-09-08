<?php
/**
 * Автозагрузка файлов
 */
spl_autoload_register(function ($class) {
    $class = __DIR__ . "\\" . $class . ".php";

    return include_once($class);
});