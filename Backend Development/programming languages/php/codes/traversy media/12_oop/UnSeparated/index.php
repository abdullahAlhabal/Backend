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
    public function __construct(){

    }
}

# create an instance of person , we have to use the "new" key word and the class name 
$p = new Person();
$p->name = "Abdullah Alhabal";
$p->surname = "abdullah";

echo "the 1st person name   is : ".$p->name.PHP_EOL ;
echo "the 1st person surnam is : ".$p->surname.PHP_EOL ;

# create a different persons with different names - will have the same properties but with different valus 

$p1 = new Person();
$p1->name = "Batool Alhabal";
$p1->surname = "batool";

echo "the 2nd person name   is : ".$p1->name.PHP_EOL ;
echo "the 2nd person surnam is : ".$p1->surname.PHP_EOL ;


# create a special function and used that speical function which is called " public function __construct(){} 
# the class can also have methods which are basically functions associated to that class   



// Create Person class in Person
// Create instance of Person
// Using setter and getter 

class ThePerson{
    public $name ;
    public $surname ;
    private $age ;

# access modifiers : public private protected 
    public function __construct($name , $surname){
        $this->name = $name ;
        $this->surname = $surname;
    }

    // setter 
    public function setAge($age){
        $this->age = $age;
    }

    public function getAge(){
        return $this->age;
    }

    // we can't access the private property , so we have to use public function [set] , that will take that age variable and save it in a the property .
}

$person = new ThePerson("Wael Hmadan" , "wael");
$person->setAge(30);
$age = $person->getAge();
echo $age ;
 


class ThisPerson{
    public $name ;
    public $surname ;
    private $age ;

    public static $counter = 0 ;
    # this , static property belong to the class itself , not the instance , not for the objects created out of that class . and to access this property , we need to use 
    # the "self" keyword ,  

# access modifiers : public private protected 
    public function __construct($name , $surname){
        $this->name = $name ;
        $this->surname = $surname;
        #whenever an instance is created , we're going to increase the counter 
        self::$counter++;
    }

    // setter 
    public function setAge($age){
        $this->age = $age;
    }

    public function getAge(){
        return $this->age;
    }

    public static function getCounter(){
        return self::$counter;
    } 

    // we can't access the private property , so we have to use public function [set] , that will take that age variable and save it in a the property .
}

?>