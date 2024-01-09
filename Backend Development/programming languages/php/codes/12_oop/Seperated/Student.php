<?php

require_once "./Person.php";

class Student extends Person{   // here , we will using inheritance , the Student class is a child class of the person . 
 
    // add couple of other properties to the Student()
    public ?string $studentId = null ; 

    public function __construct($name , $surname , $studentId){
        
        # the parent construct 
        parent::__construct($name, $surname);
        # it is always bettter to first call the parnet constructor and then call our property 
        $this->studentId = $studentId;
        # in the parent , after we make | protected int $age | we can use it here
        $this->age = 18 ;   // here , so when we use Student in the index.php , and create a new instance of the Student , the new instance will have the age 18 .

    }
}