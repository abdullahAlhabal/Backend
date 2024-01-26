<?php

class Person{

    // properties
    private $name ;
    private $eyeColor ;
    private $age ;


    public function __construct($name , $eyeColor , $age){
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->age = $age;
    }

    public function setName($name){
       $this->name = $name; 
    }

    public function getName(){
        return $this->name;
    }
}

?>