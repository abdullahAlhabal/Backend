<?php

class LoginController extends Login{
    private string $username;
    private string $password;

    private Login $loginInstance;
    public function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
        $this->loginInstance = new Login();

        $this->login();
    }

    private function login(){
        $errorType = $this->handleErrors();
        if($errorType !== true){
            $this->handleError($errorType);
        }

        $this->loginInstance->getUser($this->username, $this->password);
    }
    private function handleErrors(){
        if($this->emptyInputs())
            return "emptyInputs";

        return true;
    }

    private function handleError($errorMessage){
        header("location:./../index.php?error=".$errorMessage);
        exit();
    }
    private function emptyInputs(){
        return (empty($this->username) || empty($this->password));
    }
}