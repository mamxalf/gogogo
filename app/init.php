<?php
require 'vendor/autoload.php';
function autoLoader($class)
{
    if (file_exists(__DIR__ . '/class/' . $class . '.php')) {
        require __DIR__ . '/class/' . $class . '.php';
    }
}
spl_autoload_register('autoLoader');