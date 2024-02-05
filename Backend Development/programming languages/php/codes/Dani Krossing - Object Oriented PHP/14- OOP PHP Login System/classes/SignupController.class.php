<?php 
class SignupController extends Signup{
    private string $username ;
    private string $password ;
    private string $passwordRe ;
    private string $email ;
    private Signup $signupInstance;

    public function __construct($username, $password, $passwordRe, $email, Signup $signupInstance){
        $this->username = $username ;
        $this->password = $password ;
        $this->passwordRe = $passwordRe ;
        $this->email = $email ;
        $this->signupInstance = $signupInstance;

        $this->signup();
    }

    private function signup(){
        $errorType = $this->handleErrors();
        if($errorType !== true){
            header("location:./../index.php?error={$errorType}");
            exit();
        }

        // if there are no errors , we will signup the user by using the setUser() in Signup.class.php
        $this->signupInstance->setUser($this->username, $this->password, $this->email);

    }

    private function handleErrors(){
        if($this->emptyInput())
            return "emptyInput";

        if($this->invalidUsername())
            return "invalidUsername";

        if(!$this->passwordsMatch())
            return "passwordsMatch";

        if($this->invalidEmail())
            return "invalidEmail";

        if($this->usernameTakenCheck())
            return "usernameTakenCheck";

        return true;
    }

    private function emptyInput(){
        return (empty($this->username) || empty($this->password) || empty($this->passwordRe) || empty($this->email));
    }

    private function invalidUsername(){
        return !preg_match("/^[a-zA-z0-9]*$/",$this->username);
    }

    private function passwordsMatch(){
        return ($this->password === $this->passwordRe);
    }

    private function invalidEmail(){
        return (!filter_var($this->email,FILTER_VALIDATE_EMAIL));
    }

    private function usernameTakenCheck(){
        return $this->signupInstance->checkUser($this->email, $this->username);
    }
}


/**

    // make the validation rules 
    // 1- make sure that all the data are submited

    private function emptyInput(){
        // $result ;
        // if(empty($this->username) ||  empty($this->password) ||  empty($this->passwordRe) ||  empty($this->email)){
        //     $result = false ;
        // }else{
        //     $result = true ;
        // }
        // return $result ; 

        // return (empty($this->username) ||  empty($this->password) ||  empty($this->passwordRe) ||  empty($this->email)) ? false : true ;

        return (empty($this->username) ||  empty($this->password) ||  empty($this->passwordRe) ||  empty($this->email));
    }
    
    // 2- make sure that the user name is valide by Regular Expresion

    private function invalidUsername (){
        
        // $result ;
        // if(!preg_match("/^[a-zA-Z0-9]*$/",$this->username)){
        //     $result = false ;
        // }else{
        //     $result = true ;
        // }
        // return $result ; 

        // return $result = preg_match("/^[a-zA-Z0-9]*$/", $this->username) ? false : true ;

        return !preg_match("/^[a-zA-Z0-9]*$/",$this->username);
    }

    // 3- make sure that the password and the passwordRe are matched

    private function passwordsMatch(){
        // return $result = ($this->password !== $this->passwordRe) ? false : true ;
        return ($this->password === $this->passwordRe);
    }

    // 4- make user that the givin email address  is the right kind of email address
    private function invalidEmail(){
        return !filter_var($this->email , FILTER_VALIDATE_EMAIL);
    }

    private function usernameTakenCheck(){
        return $this->checkUser($this->username, $this->email);
    }
 
 */