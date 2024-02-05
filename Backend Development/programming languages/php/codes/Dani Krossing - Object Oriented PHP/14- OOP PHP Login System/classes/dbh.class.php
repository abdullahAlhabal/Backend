<?php 


// dsn -> mysql:host=localhost;port=3306;dbname=database_name,username,password
class Dbh{
    private string $host  = "localhost"; 
    private int $port  = 3306;
    private string $dbname = "loginsys" ; 
    private string $username = "root" ; 
    private string $password = "" ; 


    protected function connect(){
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}";

        try{

            $pdo = new PDO($dsn,$this->username, $this->password);
        
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);

            return $pdo;
            
        }catch(PDOException $ex){
            throw new Exception("Connection Failed: ".$ex->getMessage());
        }

    }
}