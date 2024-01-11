<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);

$simpleAutoloader = function (string $className) {

    $className = str_replace('\\', '/', $className);

    if(file_exists("{$className}.php")){
        require_once "{$className}.php";
    }
};


spl_autoload_register($simpleAutoloader);

?>