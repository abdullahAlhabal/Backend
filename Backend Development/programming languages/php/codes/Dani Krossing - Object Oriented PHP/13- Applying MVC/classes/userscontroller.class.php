<?php

class UsersController extends Users{
    // when 

    public function createUser($dbname, $firstName, $lastName, $dateOfBirth){
        $this->setUser($dbname, $firstName, $lastName, $dateOfBirth);   
    }
}

?>

