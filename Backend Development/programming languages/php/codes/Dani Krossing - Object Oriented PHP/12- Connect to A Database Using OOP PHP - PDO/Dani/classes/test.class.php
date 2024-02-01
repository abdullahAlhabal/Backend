<?php


class Test extends Dbh{

    // ineract with the database 
    // how to pull out data from the database without using prepare() statement
    // will , if we don't have user-input from the usre we don't technically need to 
    // use prepare() statement since there's nothing that the user can submit to us 
    // and that can't be uncontrolled 

    // fetch somethings from the database and isn't based on user-input , we can use it without prepare

    // dbname = test , have a tabel "users" | id	firstname	lastname	dateofbirth	

    public function getUser($dbname){
        $sql = "SELECT * FROM users ORDER BY firstname ASC";
        // $this->connect() -> $pdo
        $stmt = $this->connect($dbname)->query($sql);
        $users = $stmt->fetchAll();
        return $users;
    }
}