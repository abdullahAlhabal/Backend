<?php

class Dbh{

    private $host = "localhost"; 
    private $port = 3306; 
    private $dbname ; 

    private $username = "root"; 
    private $password = "";

    protected function connect($dbname){
        $this->dbname = $dbname;

        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}";

        $pdo = new PDO($dsn,$this->username,$this->password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); 

        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);


        /**
        instead of using ->fetchAll(PDO::FETCH_ASSOC); OR ->fetch(PDO::FETCH_ASSOC); each time after execute the statement
        
        ```php
        $fetchStatement->execute();
        $texts = $fetchStatement->fetchAll(PDO::FETCH_ASSOC);
        ```

        we can set a Default Attribute to the $pdo

        there are different way to FETCH data in php like "Objects"
                $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);

        */

        return $pdo;

        // when we use this connect($dbname) method , we can do 
        
        /**
            $pdoObject = new Dbh();
            $pdo = $pdoObject->connect("test");
            $statement = $pdo->prepare( SQL_CODE_GOES_HERE);
        */

    }



}


?>
