<?php

require_once "./includes/class.autoload.php";

$userView = new UsersView();
$userView->showUser('test' , 'wael');

$userContr = new UsersController();
$userContr->createUser('test',"Jhon","Doe", "1843-05-11");

$userView->searchUser("test","Jhoo" );

?>

