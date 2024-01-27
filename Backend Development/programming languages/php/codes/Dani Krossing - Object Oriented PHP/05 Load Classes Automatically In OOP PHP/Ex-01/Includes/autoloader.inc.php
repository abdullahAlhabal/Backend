<?php
spl_autoload_register('myAutoLoader');
function myAutoLoader($className){
    $path = "classes/";
    $exe  = ".class.php";
    $fullPath = $path . $className . $exe;

    if (file_exists($fullPath)) {
        require_once $fullPath;
    }
}
?>