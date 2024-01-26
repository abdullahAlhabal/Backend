<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    include_once "person.inc.php";
    
    $name01 = "Abdullah Alhabal";
    $eyeColor01= "Brown";
    $age01 = 21 ;
    $person01 = new Person($name01 ,$eyeColor01 , $age01);
    echo $person01->getName().PHP_EOL;    
    // echo $person01->name;    

    $name02 = "Batool Alhabal";
    $eyeColor02= "olivey";
    $age02 = 20 ;
    $person02 = new Person($name02 ,$eyeColor02 , $age02);
    echo $person02->getName().PHP_EOL;
    // echo $person02->name;
    ?>
</body>
</html>