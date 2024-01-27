<?php

function load_class($class_name){
    $path = "classes/" ;
    $exe = ".php";
    $fullpath = $path . $class_name . $exe;

    if(file_exists($fullpath)){
        include_once $fullpath;
    }

}

spl_autoload_register('load_class');

?>
