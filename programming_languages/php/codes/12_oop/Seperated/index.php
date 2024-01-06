<?php 

require_once "./Person.php";
require_once "./Student.php";

$p1 = new Person("abdullah alhabal", "abd");
$p1->setAge(22);

echo "the name of the 1st person is : " . $p1->name . PHP_EOL;
echo "the surname of the 1st person is : " . $p1->surname . PHP_EOL;
echo "the age of the 1st person is : " . $p1->getAge() . PHP_EOL;

$p2 = new Person("abdullah alhabal", "abd");
$p3 = new Person("abdullah alhabal", "abd");
$p4 = new Person("abdullah alhabal", "abd");

echo "the Counter is : " . Person::$counter . PHP_EOL;  // 4 

// instance of the Student() class , Student : Required parameter "$name" | "$surname" missing .    
# because the Student extends the Person()  , the Student() also has the __construct() inside its parent class , and this constrauct accepts ( name , surname ) 
# so we have to specify the (name , surname) when we create an instance of the Student()

# we have add $studentId to the __construct()
$s = new Student("Brad" , "Traversy" , '1234' );


