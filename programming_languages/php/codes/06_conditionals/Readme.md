<?php

$age = 20 ;
$salary = 30000;

// Sample if 

if($age === 20 ){
    echo "Your age is 20\n";
}

// Without circle braces - when we have a single statement .

if($age > 18)   echo "Your age is greater than 18 !\n";

// Sample if-else

if($age > 20) {
    echo "your age is greater than 20\n";
}else{
    echo "your age is under or equal to  20\n";
}

// Difference between == and === 

// == : compare only the values of the variables 

if($age == 20){
    echo "True\n";
}
if($age == '20'){
    echo "True\n";
}

// ===  : compare the values and the datatypes of the variables 

if($age === 20){
    echo "True\n";
}
if($age === '20'){
    echo "True\n";        // willnot print , because the datatypse doesn't match [int:string]
}


$age == 20    ; // true
$age == '20'  ; // true
$age === 20   ; // true
$age === '20' ; // false

// If AND
if( $age > 20 && $salary === 30000)
    echo "1-Do Something\n";            // it will not be satisfied because age is not more than 20 .


// If OR
if($age > 20 && $salary || $salary === 30000)
    echo "2-Do Something\n";            // it will print 2-Do Something . because the first conditoin is not true , and the second condition is true.

// Ternary if : for something very small 

echo $age < 22 ? "Young\n" : "Old\n" ;

// Short Ternary 

$myAge = $age ?: 18 ;
$myAge1 = $age ? $age : 18 ;
echo "My age  : is 20 $myAge \n";
echo "My age1 : is 20 $myAge1 \n";

// 0 is falsible value , so 

$age = 0 ;
$myAge = $age ?: 18 ;     // here it will be (18)

echo "Age now is 18 $myAge \n";

// Null coalescing operatro

$myName = isset($name) ? $name : "John";

# we don't have $name declared int the current variables - so it will take $myName = "John";

echo "my Name $myName \n";

$name ?? "John" ;

// Switch statement 

$userRole = 'editor';    // editor , user , admin

switch($userRole){
    case "admin"    :
        echo "you are now an admin\n";
        break;
    case "user"    :
        echo "you are now an user\n";
        break;
    case "editor"    :
        echo "you are now an editor\n";
        break;
    default : 
        echo "Invaled Role";
}




?>