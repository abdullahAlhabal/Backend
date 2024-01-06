<?php

// namespace ;

class Person  {
    public string $name ; 
    public string $surname;
    // private int $age ; 
    # in this case (private) it will not be accessed out of this class , not even in the childrens , but if we make it protected $age , it will be accessed in the children
    protected int $age ; 
    public static int $counter = 0;

    public function __construct($name,$surname){
        $this->name = $name;
        $this->surname = $surname;
        self::$counter++;
    }


    public function setAge($age){
        $this->age = $age;
    }

    public function getAge(){
        return $this->age;
    }

    public function getCounte(){
        return self::$counter;
    }
}

