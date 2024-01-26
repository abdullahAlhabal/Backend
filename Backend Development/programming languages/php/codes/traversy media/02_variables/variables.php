<?php

// what is a variable 
# is a container that store same values

// variable types
# the variables is basically don't have types so , php is loosely typed language and whenever you declare variable you don't specify the type , and the variables have dynamic types
# which change the type based on the value , so to declare a variable we will need to use the dollar sign '$' and then the varaible_name 
# variable must start with a letter or Under_score , and after that it can contain digits as well 

# Valid variables_name 

// $name = 'Zura'; // dynamically took a type of that value 'string'
// $age = 28;      // dynamically took a type of that value 'integer'    

/**
 * String 
 * Integer 
 * Float/Double
 * Boolean
 * Null
 * Array
 * Object
 * Resource
 */

// Declare variables 

$name   = 'Abdullah';   // string  
$age    = 23;           // integer 
$isMale = true;         // Boolean
$height = 1.85;         // Double
$salary = null;         // Null

// Print the variables. Explain what is 

//echo $name ; // by using the echo statement
//echo $age ; // by using the echo statement

# concatination : with the dot sign 

echo 'name : '.$name . PHP_EOL ;
echo 'age : '.$age . PHP_EOL ;    
echo 'isMale : '.$isMale . PHP_EOL ;   // will converted to [1] and the false will converted to an empty string  
echo 'height : '.$height . PHP_EOL ; 
echo 'salary : '.$salary . PHP_EOL ;   // will converted to an empty string  

// Print the type of the variable
echo PHP_EOL.'gettype($name) : '.gettype($name).PHP_EOL;    // string 

// print the whole variable
echo "\nprint the whole variable : \n"; 
var_dump($name , $age , $salary , $height).PHP_EOL;// will print all the information we will need 

/**
    int(23)
    NULL
    float(1.85)
 */

// change the value of the variable 

$name = false ; 

echo gettype($name);    // boolean

# some function to work with variables 

is_string($name); // evaluate to true or false -> in this case now the $name is not a string so it will evaluate to false 

// is_int();
// is_bool();
// is_double();


# check if the variable is defined  (declared or not )
isset($name);       // chekc if the variable is declared and evaluate into true or false 
isset($address);    // false 

# Constants : is a variable whenever you assign something you cannot actullay change that , it's not actually 

define('PI' , 3.14);    // it can by a number , boolean , string 

echo PI .PHP_EOL;    // how we access constant in php 

# Using PHP buil-in constant 
echo SORT_ASC.PHP_EOL;
echo PHP_INT_MAX.PHP_EOL ;



?>