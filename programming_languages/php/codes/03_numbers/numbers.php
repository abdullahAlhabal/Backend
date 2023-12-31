<?php

// Declaring numbers 
$a = 5 ;
$b = 4 ;
$c = 1.2 ;  // float


// Aritmetic Operations 
echo $a + $b ;          // 9
echo $a + $b + $c ;     // 10.2
echo $a + $b * $c ;     // 9.8
echo ($a + $b) * $c ;   // 9 * 1.2 => 10.8
echo $a / $b ;          //  1.25 
echo $a % $b ;          // reminder => 1

// Assignment with math operators
$a = $a + $b ;  // => $a += $b ;

$a += $b ; echo $a.'<br>'; // $a = 9
$a -= $b ; echo $a.'<br>'; // $a = 1
$a *= $b ; echo $a.'<br>'; // $a = 20
$a /= $b ; echo $a.'<br>'; // $a = 1.25
$a %= $b ; echo $a.'<br>'; // $a = 1

// Increment operator 
echo $a++;   // will print the old value of $a then increment the value of $a by one  
++$a;        // will increment the value of $a by one then print the new value of $a  

// Decrement operatro 
echo $a++;   // will print the old value of $a then decrement the value of $a by one  
++$a;        // will decrement the value of $a by one then print the new value of $a  

// Number checking functions - couple of functions of functions 
is_float(1.25);      // true
is_double(1.25);     // true
is_int(5);           // true 
is_numeric("3.14");  // true , it understands what's the actual value of the string , and print true
is_numeric("3g.45"); // false

// Conversion  : how we can convert a string value into an (int , float ...) 

$strNumber = '12.34';
$number = (float)$strNumber ;   // it will take the $strNumber and cast it on the float 
var_dump($number);       // float(12.34)

$strNumber = '12.34';
$number = (int)$strNumber ;   // it will take the $strNumber and cast it on the int 
var_dump($number);       // int(12)

// Number Functions : work with numbers

echo "abs(-15)". abs(-15).'<br>';               // 15
echo "sqrt(16)". sqrt(16).'<br>';               // 4  take the square root from that value
echo "pow(2,3)". pow(2,3).'<br>';     // 8  it takes two arguments the first is the base and the second is the exponential 
echo "max(2,3)". max(2,3).'<br>';   // 3  take the maximum number of given ones max(2,9,3)   -> 9
echo "min(3,2)". min(3,2).'<br>';   // 2  take the minimum number of given ones min (16,3,9) -> 3
echo "round(2.4)". round(2.4).'<br>';           // 2  with a normal mathematician way  
echo "round(2.6)". round(2.6).'<br>';           // 3  with a normal mathematician way 
echo "floor(2.6)". floor(2.6).'<br>';           // 2  mian rounds down 
echo "ceil(2.4)". ceil(2.4).'<br>';             // 3  main rounds up

// Formatting Numbers 

$number = 123456789.12345;


echo number_format($number , 2 , ',' , ' ');    // 123 456 789,12
echo number_format($number , 3 , '.' , '-');    // 123-456-789.123


?>
