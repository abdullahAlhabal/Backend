<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include_once "./Includes/newClass.inc.php";
        $object = new NewClass();
        unset($object);
        var_dump($object);

        /** 
            when we destruct the class , we can't use it any more 
            so if we destruct the class then echo the $object->getProperty();
            using the unset() built-in function in php 
            unset() : delete or destroy the object  -> this function unset() , will run the __destruct() method in the class
        */
    ?>
</body>
</html>