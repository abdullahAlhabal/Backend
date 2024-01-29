<?php

function autoload_classes($className){

    // $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    // if(strpos($url,'includes')){
    //     $path = "../classes/";
    // }else{
    //     $path = "classes/";
    // }

    $path = "classes/";
    $exe = ".class.php";

    $fullpath = $path . $className . $exe ; 

    if(file_exists($fullpath)){
        require_once $fullpath;
    }
}

spl_autoload_register('autoload_classes');

?>
