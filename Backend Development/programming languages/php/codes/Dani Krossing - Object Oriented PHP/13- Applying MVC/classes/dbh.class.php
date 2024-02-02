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
        //ATTR_DEFAULT_FETCH_MODE
        return $pdo;

    }
}