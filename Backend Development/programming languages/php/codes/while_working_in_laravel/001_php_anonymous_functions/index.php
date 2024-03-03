<?php

// php anonymous function 


function multiply ($x, $y){
    return $x * $y ;
}


echo multiply(5,4);


// the anonymous function will look like 

$multiply = function ($x, $y){
    return $x * $y;
};

echo $multiply(2,6);

// since the function don't have a name , we need to eind it with a semicolon

var_dump(PHP_EOL,$multiply);
// when dump it, we will see that it's actually a Closure object 



/* variable, anonymous & arrow functions  */

function sum(int|float ...$numbers) : int|float{
    return array_sum($numbers);
}

echo sum(1, 2, 3, 4);


// anonymous funciton 

$sum = fn(int|float ...$numbers) => {
    return array_sum($numbers)
}