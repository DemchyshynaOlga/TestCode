<?php

/**
 * autoload classes function
 */
spl_autoload_register(function ($class) {
	$fileName = __DIR__ . '\/classes\/' . $class . '.php';
    if (file_exists($fileName)) {
        require_once('classes\/' . $class . '.php');
    } else {
        throw new Exception("Class '{$class}' could not be found");
    }
});