<?php 

// What is the class and instance 

# class : is a template (blueprint) - a new datatype - and of which we can create a variable of that data type and that variable are called instance (object sometime) 
# whenever we create a class we define some properties and functionalities of that class and then 
# the instances of that class will have that properties and functionalities 

class Person{
    public $name ;
    public $surname ;
    private $age ;

# access modifiers : public private protected 

}

# create an instance of person , we have to use the "new" key word and the class name 

$p = new Person();
$p->name = "abdullah Alhabal";
$p->surname = "abdullah";

echo "the person name is : ".$p->name.PHP_EOL;
echo "the person sur name is : ".$p->surname.PHP_EOL;

# create a different persons with different names - will have the same properties but with different valus 
$p2 = new Person();
$p2->name = "batool Alhabal";
$p2->surname = "batool";

echo "the 2nd person name is : ".$p2->name.PHP_EOL;
echo "the 2nd person sur name is : ".$p2->surname.PHP_EOL;

# create a special function and used that speical function which is called  

// Create Person class in Person.php


// Create instance of Person


// Using setter and getter 


?>