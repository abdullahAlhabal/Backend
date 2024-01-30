<?php

function autoload_classes($className){

    $path = __DIR__."/../classes/";
    $exe = ".class.php";

    $fullpath = $path . $className . $exe ; 

    file_exists($fullpath) ? require_once $fullpath : die("Couldn't open the Class $className at path : \n$fullpath\n") ;
}

spl_autoload_register('autoload_classes');

?>
