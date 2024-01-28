<?php

declare( strict_types = 1 );
require_once "autoload.php";

$num1 = $_POST['num1'];
$op = $_POST['op'];
$num2 = $_POST['num2'];

// we should cast the parameters because we have make type hinting 
$calc = new Calc\Calc((float)$num1,(string)$op,(float)$num2);

try{
    $resutl = $calc->calculate();
    echo $resutl ;
}catch (TypeError $e){
    echo "Error! : " . $e->getMessage();
}

?>
