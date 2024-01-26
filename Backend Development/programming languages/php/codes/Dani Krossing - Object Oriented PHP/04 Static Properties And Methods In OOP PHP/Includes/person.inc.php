<?php 

// do I need to use this method or this property wihtout creating an Object first 
// what is the Purpose of creating an Object 
// The class is Template | BluePrint , we might want to create many different objects of many many different people 
// We Might want to create a property or a method that isn't directly linked to creating an object from this class
// 


class Person{
    private $name ;
    private $eyeColor ;
    private $age ;

    // universal thing for all the different people , it's doesn't matter if it's Abdullah, Ali, Akram, Or Lisa, all the
    // people have a milkAge of 2 years .
    // so from our index.php file , we can get this static property , wihtout instanting an object out of the class 
    public static $milkAge = 2  ;

    public function __construct($name,$eyeColor,$age){
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

    public function getDA(){
        return self::$milkAge;
    }
    public static function changeMilkAge($newAge){
        self::$milkAge = $newAge;
    }

    // to access static properties and methods we use `::`
}

?>