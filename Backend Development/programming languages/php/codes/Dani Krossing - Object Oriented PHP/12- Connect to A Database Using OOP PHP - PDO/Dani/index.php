<?php 

require_once "./includes/classes-autoload.inc.php";

$test = new Test();

$users = $test->getUser("test");


if(!count($users)){
    echo "There are no users in the database !".PHP_EOL;
}else{
    foreach($users as $i => $user){
        echo sprintf("%d - %s %s , Birth at : %s \n",$i,$user['firstname'],$user['lastname'],$user['dateofbirth']);
    }
}

?>