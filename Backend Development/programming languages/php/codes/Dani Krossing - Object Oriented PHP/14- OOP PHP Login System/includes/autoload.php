<?php

spl_autoload_register("autoloadClasses");


function autoloadClasses($className){
    $path = "classes/"; 

    $exe = ".class.php" ; 

    $fullpath  = $path . $className . $exe ; 

    file_exists($fullpath) ? require_once $fullpath : die("Couldn't load the class $className .\n");
}