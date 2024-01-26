<?php

class NewClass{

    public $data = "I am a property!\n";
    public function __construct(){
        echo "This class has been instantiated \n";
    }

    public function setNewProperty($newdata){
        $this->data = $newdata;
    }
    public function getProperty(){
        return $this->data;
    }

    public function __destruct(){
        echo "\nThis is the end of the class!\n";
    }

}

/**
    when we destruct the class , we can't use it any more 
 */

?>

