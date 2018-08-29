<?php

function autoload($classname) {
    $corePath = 'core/' . $classname . '.php';
    $libPath = 'lib/' . $classname . '.php';
    if (file_exists($corePath)) {
        require_once($corePath);
    } else if (file_exists($libPath)) {
        require_once($libPath);
    } else {
        die('No such file found..');
    }
}

spl_autoload_register('autoload');
