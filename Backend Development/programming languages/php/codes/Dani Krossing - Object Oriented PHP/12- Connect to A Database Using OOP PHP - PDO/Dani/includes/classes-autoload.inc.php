<?php


function autoLoader($class_name){
    $path = "classes/";
    $exe  = ".class.php";

    $fullPath = $path . $class_name . $exe ;

    file_exists($fullPath) ? require_once $fullPath : dir("Couldn't include $class_name .\n");
}

spl_autoload_register('autoLoader');
?>