<?php

// Create an array
$arr = [];

# new-fashioned approach 
$fruits = [
    'apples',
    "Banana",
    'Oragne'
];

// we can use single or double quotations - so we don't have a preferred choice 

# old-fashioned approach 
// $fruits = array();


// Print hte whole array 

var_dump($fruits);
/* 
array(3) {
  [0]=>
  string(6) "apple"
  [1]=>
  string(6) "Banana"
  [2]=>
  string(6) "Oragne"
}
*/


// Get Element by index
echo $fruits[0];    // apple
echo $fruits[1];    // Banana
echo $fruits[2];    // Orange
echo $fruits[3];    // Undefined offset : 3 

// Set element by index 
$fruits[0] = "watermillon";
echo "\n".$fruits[0];    // watermillon

// Check of array has element at index
echo "\nIsset ? ".isset($fruits[0]);    // true => 1  - "1" string   
echo "\nIsset ? ".isset($fruits[3]);    // false => 0 - empty string 

// Append element
$fruits[] = 'Banana';   // will put 'Banana' in the $friuts[3];
var_dump($fruits);

// Print the length of the array 
echo count($fruits);    // 4 

// add element at the end of the array array_push( the_array , the_value)
array_push($fruits , "peach" ); 

// remove element from the end of the array array_pop( the_array ) , this will remove the last element 
# which in this case "peach" and return that , and will also modify the original array.

echo array_pop($fruits);    // peach
# and the array 
var_dump($fruits);

/*
peach
array(4) {
  [0]=>
  string(11) "watermillon"
  [1]=>
  string(6) "Banana"
  [2]=>
  string(6) "Oragne"
  [3]=>
  string(6) "Banana"
}
*/

// add the element (insert) at the beginning of the array array_unshift( the_array , the_value ); 
array_unshift($fruits , "bar");

var_dump($fruits);

/*
 array(5) {
    [0]=>
    string(3) "bar"
    [1]=>
    string(11) "watermillon"
    [2]=>
    string(6) "Banana"
    [3]=>
    string(6) "Oragne"
    [4]=>
    string(6) "Banana"
 }
 */

// remove the element at the beginning of the array array_shift( the_array ); 
# this will remove the first element 
# which in this case "bar" and return that , and will also modify the original array.

echo array_shift($fruits);  // bar

var_dump($fruits);

/*
 array(5) {
    [0]=>
    string(11) "watermillon"
    [1]=>
    string(6) "Banana"
    [2]=>
    string(6) "Oragne"
    [3]=>
    string(6) "Banana"
 }
 */

// Split the string into an array 
# if I have a string and contains couple of friutes 

$food = "Banana,Apple,Peach";

# and I want to convert this into an array , so we will use the explode(the_separator , the_string ) function , the separator in this case is "," 

var_dump(explode(',' , $food ));
/*
array(3) {
  [0]=>
  string(6) "Banana"
  [1]=>
  string(5) "Apple"
  [2]=>
  string(5) "Peach"
}
*/

// Combine array elements into string -> convert array to a string Implode(the_separator , The_string);

echo implode(" " , explode(',',$food)); // $food = "Banana,Apple,Peach";    => "Banana Apple Peach" 

// Check if element exist in the array in_array(elemnet , the_array) : and it return true of false .

echo in_array("Oragne" ,$fruits );   // 1 
echo in_array("Mango" ,$fruits );   // 0 


// Search element index in the array - return the index and if the element doesn't in the array , it return bool(false) else will return the index
var_dump(array_search('Oragne' , $fruits)); // int(2)

// Merge two arrays
$vegetables = ["Potato" , "cucumber"];

# and we want to merge the $friutes and $vegetables into a single one - and it will return a new array - so we can assign to a new array or just print it
$Foods = array_merge($fruits , $vegetables) ;

var_dump($Foods);

/*
array(6) {
  [0]=>
  string(11) "watermillon"
  [1]=>
  string(6) "Banana"
  [2]=>
  string(6) "Oragne"
  [3]=>
  string(6) "Banana"
  [4]=>
  string(6) "Potato"
  [5]=>
  string(8) "cucumber"
}
*/

# a new way after PHP 7.4 , to merge arrays . 
$NewFood = [...$fruits , ...$vegetables];

var_dump($NewFood);
/*
array(6) {
  [0]=>
  string(11) "watermillon"
  [1]=>
  string(6) "Banana"
  [2]=>
  string(6) "Oragne"
  [3]=>
  string(6) "Banana"
  [4]=>
  string(6) "Potato"
  [5]=>
  string(8) "cucumber"
}
*/

# sort the array , modify the original array in the correct order 

sort($NewFood);

var_dump($NewFood);

/*
array(6) {
  [0]=>
  string(6) "Banana"
  [1]=>
  string(6) "Banana"
  [2]=>
  string(6) "Oragne"
  [3]=>
  string(6) "Potato"
  [4]=>
  string(8) "cucumber"
  [5]=>
  string(11) "watermillon"
}
*/

# sort the array , modify the original array in the correct order  , in reverse order 

rsort($NewFood);

var_dump($NewFood);

/*
array(6) {
  [0]=>
  string(11) "watermillon"
  [1]=>
  string(8) "cucumber"
  [2]=>
  string(6) "Potato"
  [3]=>
  string(6) "Oragne"
  [4]=>
  string(6) "Banana"
  [5]=>
  string(6) "Banana"
}
*/


// =============================================================
// Associative arrays
// =============================================================

$person = [
    'name'  => 'Abdullah' , 
    'surname'  => 'Abd' , 
    'age'   => 30 ,
    'hobbies'   => ['Tennis' , 'Video Games']
];

var_dump($person);

/*
array(4) {
  ["name"]=>
  string(8) "Abdullah"
  ["surname"]=>
  string(3) "Abd"
  ["age"]=>
  int(30)
  ["hobbies"]=>
  array(2) {
    [0]=>
    string(6) "Tennis"
    [1]=>
    string(11) "Video Games"
  }
}
*/

// print the array with print_r() function

print_r($person);

/*
Array
(
    [name] => Abdullah
    [surname] => Abd
    [age] => 30
    [hobbies] => Array
        (
            [0] => Tennis
            [1] => Video Games
        )

)
*/

// Get Element by the key 

echo $person['name'];   // Abdullah
# access non-existing key 
// echo $person['address'];    // Warning Notice : Undefined Index

// Set Elemnet by key 
$person['channel'] = "TraversyMedia";

print_r($person);

/*
Array (
  [name]  => Abdullah
  [surname] =>  abd
  [age] => 30
  [hobbies] =>  Array 
    (
      [0] => Tennis
      [1] => Video Games
    )
    [channel] => TraversyMedia
)
*/

// Null coalescing assignemnt operator 

# if person['address'] doesn't exist 
if(!isset($person['address'])){
  $person['address'] = 'Unknow';
}

# Shorthand 


# null coalescing assignemnt 
$person['address']  = $person['address'] ?? 'Unknow' ;
$person['address']  ??= 'Unknow';
## the double ?? => is generally is used for checking if the value is set or not 

# tenary operato
$person['address']  = $person['address'] ?  $person['address']  : 'Unknow' ; 


// Use the null coalescing assignment (??=) 
#to assign a default value if the array key doesn't exist or is null.

// Use the ternary operator (? :) 
#to perform different operations based on the existence of the array key or its value.

# some Examples of Ternary Operator 

// Basic Usage 

// Assign a value based on a condition 

$age = 20;
$message = ($age >= 18) ? 'You are an adult'. PHP_EOL : 'You are a minor'. PHP_EOL ; 
echo $message ; 

echo ($age >= 21) ? 'You can drivae the car'. PHP_EOL : "You cann't drive the car". PHP_EOL ;

//  there are an error here : echo ($age >= 21) ? 'You can drivae the car ' : ' You cann't drive the car ' ;  => if we want to add a SINGLE QUOTATION we should use " ' " , not ' ' ' 

$isMember = true; 
$discount = ($isMember) ? 10 : 0 ;
echo "Discount $discount%". PHP_EOL;

function checkNumber($number){
  return ($number > 0) ? "Positive".PHP_EOL : "Negative".PHP_EOL;
}

echo checkNumber(15);
echo checkNumber(-2);

// Chekc if the array has a specific key 

echo isset($person['status']) ?  "have Status\n" :  "Don't have status\n" ;
  

// Print the  keys of the array 

$array = [ 'a'  => 'apple' , 'b'  =>  'banana' ,  'c' => 'cherry'];
$keys = array_keys($array);
print_r($keys);

// will print an array of keys :
/*
Array
(
    [0] => a
    [1] => b
    [2] => c
)
*/

// Print the array values - print the values of the array 

print_r(array_values($array));

// 
/*
Array 
(
  [0] => apple
  [1] => banana
  [2] => cherry
)
*/

// Sorting the associative arrays by value / keys 

ksort($person);

var_dump($person);

/*
array(6)  {
  ['address'] => 
  string(7) 'Unknow'
  ['age'] => 
  int(30)
  ['channel]  =>
  string(13) "TraveryMedia"
  ['hobbies]  =>
  array(2)  {
    [0] =>
    string(6)  "tennis"
    [1] =>
    string(11)  "Video Games"
  }
  ['name'] => 
  string(8)  "Abdullah"
  ['surname'] =>
  string(3)  "Abd" 
}
*/

// Sorting the associative arrays by value  
asort($person);

// Two Dimensional arrays

$todos  = [
  [
    'title' => "Todo title 1 ",
    'completed' =>  true
  ],
  [
    'title' => "Todo title 2 ",
    'completed' =>  false
  ],
];

var_dump($todos);

/*
array(2)  {
  [0] =>  
  array(2) {
    ['title]  =>
    string(13)  "Todo title 1 "
    ['completed'] =>
    bool(true)
  }
  [1] =>
  array(2)  {
    ['title'] =>  
    string(13)  "Todo title 2"
    ['completed'] =>
    bool(false)
  } 
}
*/

?>