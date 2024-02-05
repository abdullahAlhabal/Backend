<?php 

class Signup extends Dbh{
    protected function checkUser(string $username, string $email) : bool{
        
        try{
            $restult = $this->getCount($username, $email) > 0 ;
        }catch(Exception $e){
            $this->handleError($e->getMessage());
        }

        return $restult;
    }
    
    private function getCount($username, $email){
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email;";
 
        $stmt = $this->connect()->prepare($sql);

        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":email", $email);

        $stmt->execute();

        $count = $stmt->fetchColumn();
        return $count;
    }

    protected function setUser($username, $password, $email){

        $hashedPassword = $this->hashPassword($password);

        $pdo = $this->connect();
        $pdo->beginTransaction();

        try{
            $this->insertUser($pdo, $username, $hashedPassword, $email);
            $pdo->commit();
        }catch(Exception $ex){
            $pdo->rollBack();
            $this->handleError($ex->getMessage());
        }
    }

    private function hashPassword(string $password){
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    private function insertUser(PDO $pdo, string $username, $hashedPassword,string  $email){
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email);";
    
        $stmt = $pdo->prepare($sql);
        
        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":password", $hashedPassword);
        $stmt->bindValue(":email", $email);
    
        $stmt->execute();
    }

    private function handleError($errorMessage){
        header("location:./../index.php?error=".$errorMessage);
        exit();
    }
}