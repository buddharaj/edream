<?php

function __ticTacToeAutoload($class) {
    $filePath = str_replace('\\', '/', $class);
    $file = __DIR__ . "/{$filePath}.php";
    require($file);
}

spl_autoload_register('__ticTacToeAutoload');