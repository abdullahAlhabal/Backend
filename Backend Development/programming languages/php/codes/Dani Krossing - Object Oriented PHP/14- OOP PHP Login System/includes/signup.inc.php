<?php

if(!isset($_POST['submit'])){
    header("location:./../index.php");
}else{

    require_once "./../classes/dbh.class.php";
    require_once "./../classes/Signup.class.php";
    require_once "./../classes/SignupController.class.php";

    // Grabbing the data  
    $username = $_POST['username'];
    $password = $_POST['password'];
    $passwordrepeat = $_POST['passwordrepeat'];
    $email = $_POST['email'];

    $signup = new Signup();
    $signupCont = new SignupController($username, $password, $passwordrepeat, $email, $signup);
    header("location:./../index.php?error=none");
}