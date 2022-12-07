<?php

session_start();

require_once './bootstrap.php';

spl_autoload_register('autoload');

function autoload ($className) {
    $arrayPaths = array(
        'database/' ,
        'models/' ,
        'controllers/'
    );

    $parts = explode('\\', $className);
    
    $name = array_pop($parts);

    foreach($arrayPaths as $path) {
        $file = sprintf($path . '%s.php', $name);
        if(is_file($file)) {
            include_once $file;
        }
    }
}