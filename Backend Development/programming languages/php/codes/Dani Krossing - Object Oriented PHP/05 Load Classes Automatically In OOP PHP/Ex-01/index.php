<?php
include_once "./Includes/autoloader.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head> 
<body>
    
    <?php 

        $person01 = new Person("John" , 22);
        echo $person01->getPerson();

        echo PHP_EOL;

        $house01 = new House("Jornal" , 12 );
        echo $house01->getAddress();

    ?>

</body>
</html>