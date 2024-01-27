<?php

namespace Person ;

class Person{

    // properites
    public $name;
    public $eyeColor;
    public $age;

    /**public function __construct($name , $eyeColor , $age){
        $this->name = $name;
        $this->eyeColor = $eyeColor;
        $this->age = $age;
    }*/

    /**
    Methods : 
        by using type declaration, we can throw an error if wrong type is given!
    works with :

        - class/interface names
        - self (used to reference to same class)
        - array 
        - callable
        - bool
        - float
        - int
        - string
        - iterable
        - object 
     */

     public function setName(string $newName){
        // included that , the datatype is string inside this method when pass in a parameter 
        $this->name = $newName;
     }


     public function getName(){
        return $this->name; 
     }

     /**
        now we have the `strict mode` inside php which : php accepts integers as a string 
        enable the strict mode by active it using 
        declare(strict_types = 1)
      */

}
?>
