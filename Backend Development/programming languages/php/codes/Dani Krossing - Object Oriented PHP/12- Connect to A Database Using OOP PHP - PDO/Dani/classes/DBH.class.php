<?php

class Dbh{

    private $pdo ;
    private $dsn ;
    private $host = "localhost"; 
    private $port = 3306; 
    private $dbname ; 

    private $username = "root"; 
    private $password = "";

    protected function connect($dbname){
        $this->dbname = $dbname;
        $this->dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}";
        $this->pdo = new PDO($this->dsn,$this->username,$this->password);
        //
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION); 
        //
        $this->pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);


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

        return $this->pdo;

        // when we use this connect($dbname) method , we can do 
        
        /**
            $pdoObject = new Dbh();
            $pdo = $pdoObject->connect("oop");
            $statement = $pdo->prepare( SQL_CODE_GOES_HERE);

        */
    }



}