<?php

function autoload_classes($className){

    $path = __DIR__."/../classes/";
    $exe = ".class.php";

    $fullpath = $path . $className . $exe ; 

    file_exists($fullpath) ? require_once $fullpath  : die("Couldn't open the Class \'$className\' at path : \n$fullpath\n") ;
}

function autoload_interfaces($interfaceName){

    $path = __DIR__."/../interfaces/";
    $exe = ".interface.php";

    $fullpath = $path . $interfaceName . $exe ; 

    file_exists($fullpath) ? require_once $fullpath : die("Couldn't open the interface \'$interfaceName\' at path : \n\n$fullpath\n\n") ;

}

spl_autoload_register('autoload_interfaces');
spl_autoload_register('autoload_classes');

?>
