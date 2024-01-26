<?php 

include_once "./Includes/person.inc.php";

// echo  Person::$milkAge.PHP_EOL;
// Person::changeMilkAge(4);
// echo  Person::$milkAge.PHP_EOL;

$person01 = new Person("john" ,"Black",25);
echo $person01->getDA().PHP_EOL;
$person01->changeMilkAge(4);
echo $person01->getDA().PHP_EOL;



?>