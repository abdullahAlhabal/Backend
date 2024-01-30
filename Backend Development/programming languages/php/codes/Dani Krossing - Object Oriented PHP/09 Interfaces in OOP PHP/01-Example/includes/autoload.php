<?php

function autoload_classes($className){

    $path = "classes/";
    $exe = ".php";

    $fullpath = $path . $className . $exe ; 

    if(file_exists($fullpath)){
        require_once $fullpath;
    }
}

function autoload_interfaces($interfaceName){

    $path = "classes/";
    $exe = ".php";

    $fullpath = $path . $interfaceName . $exe ; 

    if(file_exists($fullpath)){
        require_once $fullpath;
    }
}



spl_autoload_register('autoload_interfaces');
spl_autoload_register('autoload_classes');

?>
