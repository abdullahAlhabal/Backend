<?php

if(!isset($_POST['submit'])){
    header("location:./../index.php");
}else{

    require_once "./../classes/dbh.class.php";
    require_once "./../classes/Login.class.php";
    require_once "./../classes/LoginController.class.php";

    // Grabbing the data  
    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = new Login();
    $loginCont = new LoginController($username, $password);
    header("location:./../index.php?error=none");
}