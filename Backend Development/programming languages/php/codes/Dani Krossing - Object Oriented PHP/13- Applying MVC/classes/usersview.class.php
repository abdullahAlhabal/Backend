<?php

class UsersView extends Users{

    public function showUsers($dbname){
        $users = $this->getUsers($dbname);  // return an Associative array
        if(!count($users)){
            echo "There are no users to display\n";
        }else{
            foreach($users as $user){
                echo sprintf("%d - the full name is : %s %s and Birth %s\n",$user['id'],$user['firstname'],$user['lastname'],$user['dateofbirth'],);
            }
        }
    }  

    public function searchUser($dbname, $search){
        $result = $this->Search($dbname, $search);
        if(!$result){
            echo "there are no usres which there first name contain : $search \n";
        }else{
            foreach($result as  $i => $user ){
                echo sprintf("%d : %s \n" , $i , $user['firstname']);
            }
        }
    }
    public function showUser($dbname , $firstName){
        $user = $this->getUser($dbname, $firstName);
        if(!$user){
            echo "there is no user with first name : {$firstName}\n";
        }else{
            echo sprintf("the user with name {$user["firstname"]} was found in the database\n");
        }

    }  
}

?>

