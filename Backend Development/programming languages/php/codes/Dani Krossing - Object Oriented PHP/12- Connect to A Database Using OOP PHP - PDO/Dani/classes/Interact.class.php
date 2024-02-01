<?php


class Interact extends Dbh{
    public function getUsers($dbname){
        $sql = "SELECT * FROM users ORDER BY firstname ASC";
        $stmt = $this->connect($dbname)->prepare($sql);
        $users = $stmt->fetchAll();
        return $users;
    }

    public function setUser($dbname, $firstName, $lastName, $dateOfBirth){
        $sql = "INSERT INTO users (firstname, lastname, dateofbirth) VALUES (:firstname, :lastname, :dateofbirth)";
        
        $stmt = $this->connect($dbname)->prepare($sql);
        
        $stmt->bindValue(":firstname" , $firstName);
        $stmt->bindValue(":lastname" , $lastName);
        $stmt->bindValue(":dateofbirth" , $dateOfBirth);

        $stmt->execute();
    }

    public function deleteUsers($dbname){
        $sql = "DELETE FROM users";
        $stmt = $this->connect($dbname)->prepare($sql);
        $stmt->execute();
    }

    public function updateUsers($dbname, $firstName, $lastName, $dateOfBirth){
        $sql = "UPDATE users SET firstname = :firstname , lastname = :lastname , dateofbirth = :dateofbirth";
        
        $stmt = $this->connect($dbname)->prepare($sql);

        $stmt->bindValue(":firstname" , $firstName);
        $stmt->bindValue(":lastname" , $lastName);
        $stmt->bindValue(":dateofbirth" , $dateOfBirth);

        $stmt->execute();

    }   

}





    // ineract with the database 
    // how to pull out data from the database without using prepare() statement
    // will , if we don't have user-input from the usre we don't technically need to 
    // use prepare() statement since there's nothing that the user can submit to us 
    // and that can't be uncontrolled 

    // fetch somethings from the database and isn't based on user-input , we can use it without prepare

    // dbname = test , have a tabel "users" | id	firstname	lastname	dateofbirth	