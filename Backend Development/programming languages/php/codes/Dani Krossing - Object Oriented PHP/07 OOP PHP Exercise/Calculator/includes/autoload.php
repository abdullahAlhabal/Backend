<?php

function autoload($class_name){

    // use $_SERVER['REQUEST_RUI'] NOT $_SERVER['REQUEST_METHOD'] I SPEND LIKE A TWO HOURS HERE 😁🤏🏻 
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if(strpos($url, 'includes')){
        $path = "../classes/";
    }else{
        $path = "classes/";
    }

    $exe = ".php";

    $fullpath = $path . $class_name . $exe;

    if(file_exists($fullpath)){
        require_once $fullpath;
    }
}

spl_autoload_register('autoload');

?>
