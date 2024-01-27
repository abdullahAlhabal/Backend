<?php

declare(strict_types = 1 );

include_once "./includes/autoloading.php";

$person = new Person\Person();

try{
    $person->setName("Abdullah");
    echo $person->getName();
}catch(TypeError $e){
    echo "Error! : ".$e->getMessage();
}

?>
