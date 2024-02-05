<?php

class Login extends Dbh{
    protected function getUser($username, $password){

        $pdo = $this->connect();
        $pdo->beginTransaction();
        
        try{
            $hashedPassword = $this->getUserPassword($username, $pdo);
            $pdo->commit();
        }catch(Exception $ex){
            $pdo->rollBack();
            $this->handleError($ex->getMessage());
        }
        $this->verifyPassword($password,$hashedPassword);
        
        try{
            $user = $this->getUserDetails($username,$hashedPassword, $pdo); // pass the hashedPassword
        }catch(Exception $ex){
            $this->handleError($ex->getMessage());
        }

        $this->startSession($user);

    }
    private function getUserPassword($username , PDO $pdo){
        $sql = "SELECT password FROM users WHERE username = :username ;";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(":username",$username);

        $stmt->execute();
        $hashedPassword = $stmt->fetchColumn();
        
        if(empty($hashedPassword)){
            $stmt = null;
            $this->handleError("userNotFound_getUserPassword");
        }

        return $hashedPassword;
    }

    private function verifyPassword($password, $hashedPassword){
        $checkPassword = password_verify($password,$hashedPassword);

        if(!$checkPassword){
            $this->handleError("userNotFound_verifyPassword");
        }
        return true;
    }

    private function getUserDetails($username, $password, PDO $pdo){
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password;";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(":username", $username);
        $stmt->bindValue(":password", $password);

        $stmt->execute();

        if($stmt->rowCount() == 0){
            $stmt = null ;
            $this->handleError("userNotFound_getUserDetails");
        }
        return $stmt->fetchAll()[0];
    }

    private function startSession($user){
        session_start();
        session_regenerate_id(true);

        $_SESSION["userid"] = $user['id'];
        $_SESSION["username"] = $user['username'];
    }

    private function handleError($errorMessage){
        header("location:./../index.php?error={$errorMessage}");
        exit();
    }
}