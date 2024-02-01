<?php 

class Dbh{
    private string $host = "localhost";
    private string $dbname ;
    private int $port = 3306;
    private string $password = ""; 
    private string $username = "root";

    protected function connect($dbname){
        $this->dbname = $dbname ; 

        // dsn : mysql:host=localhost;port=3306;dbname=dbname
        $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname}";
        // pdo (dsn , username , password)
        $pdo = new PDO($dsn , $this->username , $this->password);

        // set attributes
        $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);

        return $pdo ; 
    }
}


class Test extends Dbh{

    public function getUser($dbname){
        // $Setstatement = $this->connect($dbname)->prepare("INSERT INTO users (firstname, lastname, dateofbirth) VALUES (:firstname,:lastname,:dateofbirth)");
        // foreach(range(0,9) as $i){
        //     $Setstatement->bindValue(':firstname' , $i);
        //     $Setstatement->bindValue(':lastname' , "abd user");
        //     $Setstatement->bindValue(':dateofbirth' , date("Y-m-d H:i:s"));
        //     $Setstatement->execute();
        // }

        // $deleteStatement = "DELETE FROM users" ;
        // $this->connect($dbname)->query($deleteStatement); 

        // $pdo->prepare(sql_statement)->execute()->fetchAll();    -> when we have user-based submited information
        // $pdo->query(sql_statement)->fetchAll();                 -> otherways.

        $sql = "SELECT * FROM users ";
        $statement = $this->connect($dbname)->query($sql);
        $users = $statement->fetchAll();
        return $users ;
    }
}

?>
