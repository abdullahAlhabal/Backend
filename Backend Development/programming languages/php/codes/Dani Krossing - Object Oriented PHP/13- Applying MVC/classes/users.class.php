<?php

// it doesn't do anything ethir than database connection , 
// we want to make it as simple as possible 
// if we have multiple query to run in the db  , we don't include them all inside one method , create different methods for each 
// that we can reuse the code again and again . 

class Users extends Dbh{
    protected function getUsers($dbname){
        $sql = "SELECT * FROM users ORDER BY firstname ASC";
        $stmt = $this->connect($dbname)->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(); // PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC
        return $users;
    }

    protected function getUser($dbname, $firstName){
        $sql = "SELECT * FROM users WHERE firstname = :firstname";
        $stmt = $this->connect($dbname)->prepare($sql);
        $stmt->bindValue(":firstname",$firstName);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }

    protected function Search($dbname, $search){
        $sql = "SELECT * FROM users WHERE firstname LIKE :firstname ORDER BY firstname ASC";
        $stmt = $this->connect($dbname)->prepare($sql);
        $stmt->bindValue(":firstname","%".$search."%");
        $stmt->execute();
        $users = $stmt->fetchAll();
        return $users;
    }

    protected function setUser($dbname, $firstName, $lastName, $dateOfBirth){
        $sql = "INSERT INTO users (firstname, lastname, dateofbirth) VALUES (:firstname, :lastname, :dateofbirth)";
        
        $stmt = $this->connect($dbname)->prepare($sql);
        
        $stmt->bindValue(":firstname" , $firstName);
        $stmt->bindValue(":lastname" , $lastName);
        $stmt->bindValue(":dateofbirth" , $dateOfBirth);
        
        $stmt->execute();
    }   // this method is exactly do insert into the database , In MVC the model is only responsibly to intract with DB so , we make the 
    // visibilty to `protected` and in the user controller , we will call setUser() only , 
    protected function deleteUsers($dbname){
        $sql = "DELETE FROM users";
        $stmt = $this->connect($dbname)->prepare($sql);
        $stmt->execute();
    }

    protected function updateUsers($dbname, $firstName, $lastName, $dateOfBirth){
        $sql = "UPDATE users SET firstname = :firstname , lastname = :lastname , dateofbirth = :dateofbirth";
        
        $stmt = $this->connect($dbname)->prepare($sql);

        $stmt->bindValue(":firstname" , $firstName);
        $stmt->bindValue(":lastname" , $lastName);
        $stmt->bindValue(":dateofbirth" , $dateOfBirth);

        $stmt->execute();

    }

}

?>

