<?php 

// Function which prints "Hello I am Abdullah"

function hello(){
    echo "Hello I am Abdullah\n";
}

hello();
hello();
hello();

// Function with argument 

function helloWorld($name){
    echo "Hello I am $name\n";
}

$name = "Abdullah AlHabal";

helloWorld($name);


// Function with return 

function SayHay($name){
    return  "Hay $name\n";
}

$name = "Abdullah AlHabal";

echo SayHay($name);

// Create sum of two numbers

function sum($a,$b){
    return $a + $b;  
}

$num1 = 5  ; 
$num2 = 16 ;


echo "the sum of $num1 and $num2 is = ".sum($num1 ,$num2).PHP_EOL;

// Create function to sum all numbers using ...$numbs

function the_sum(...$nums){ // ...$nums : take all the params and convert them to array

    $sum = 0 ;

    foreach($nums as $number)
        $sum+=$number;

    return $sum;
}

echo "the sum of [1,2,3,4,5,6] is : ".the_sum(1,2,3,4,5,6).PHP_EOL;

// Arrow functions 

function _sum (...$nums){
    return array_reduce($nums , fn($carry , $number)   => $carry + $number);
}

// array_reduce :
#   This inbuilt function of PHP is used to reduce the elements of an array into a single value that can be of float, integer or string value. 
#   The function uses a user-defined callback function to reduce the input array.

#Syntax: 
#   array_reduce($array, own_function, $initial)

# Input : $array = (15, 120, 45, 78)
#         $initial = 25
#         concatenates() takes two parameters and concatenates 
#         them with "and" as a separator in between
# Output : 25 and 15 and 120 and 45 and 78

function concatenates(...$words){
     return array_reduce($words , fn($car , $num)  =>  
     $car." and ".$num , 0);
}

echo concatenates( 15 , 120 , 45 , 78);

# Input : $array = array(2, 4, 5);
#         $initial = 1
#         multiplies() takes two parameters 
#         and multiplies them.
# Output : 40

function multiplies(...$nums){
    return array_reduce($nums,fn($car , $num)   => $car*$num ,1);
}

echo "\nthe multiplies of [2,3,5] is : ".multiplies(2,3,5).PHP_EOL;



?>
