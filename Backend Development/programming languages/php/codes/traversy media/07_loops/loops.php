<?php

// While loop

// while(true){
//     // do something 
// }



// Loop with $Counter

$counter = 0 ; 
echo 'LOOP WITH $COUNTER \n'.PHP_EOL;
while ($counter<=10){
    echo $counter.PHP_EOL;
    $counter++;
}

// Break statement 


$counter = 0 ; 
echo "THE BREAK STATEMENT \n";
while ($counter<=10){
    echo $counter.PHP_EOL;
    if ($counter === 5) break;
    $counter++;
}

# it will print 0 1 2 3 4 5


$counter = 0 ; 
echo "THE BREAK STATEMENT \n";
while ($counter<=10){
    if ($counter === 5) break;
    echo $counter.PHP_EOL;
    $counter++;
}

# it will print 0 1 2 3 4 

// do - while loop : it will do the logic then check the condition 

$counter = 0;

echo "THE DO-WHILE STATEMENT \n";
do {
    echo $counter.PHP_EOL;
    $counter++;
}while($counter<0);

# in this case the body will executed , so it will print 0 then nothing 

// for 

# $i = 0 : run at the beginning of the for loop 
# statement which is executed before every iteration of the for loop , and if that evaluates into true we actually continue the for loop , 
# statement which is executed after  every iteration of the for loop . 

echo "THE FOR LOOP :\n";
for( $i = 0 ; $i < 10 ; $i++)
    echo $i.PHP_EOL;

// foreach : it's often with in an array

echo "THE FOREACH LOOP :\n"; 
$numbers = [31,22,13,46,59];
foreach($numbers as $number)
    echo $number.PHP_EOL;

    #it take each element of that $numbers array as a $number variable 

// foreach with index

echo "THE FOREACH LOOP with INDEX :\n";

$fruits = ['apple' , 'banana' , 'cherry'];

foreach($fruits as $i => $friut)
    echo $i." - ".$friut.PHP_EOL;

// Iterate Over associative array


$person =[
    'name'  => "Abdullah",
    'surname'   => "Abd",
    'age'   => 21,
    'hobbies'   => [
        'Tennis',   
        'Programming'
    ]
];

// foreach($person as $key => $value){
//     echo $key." ".$value. PHP_EOL;
// }
// here we will have a problem , NOTICE : array to string conversion => hobbies is an array 


// foreach($person as $key => $value){
//     if(count($value)){
//         echo $key." ". implode(',',$value);
//     }else{
//         echo $key." ".$value;
//     }
// }

# count() Argument must be of type Countable|array

# so we will use is_array()

echo "foreach() with an array in the array - using if(is_array()) : \n";
foreach($person as $key => $value){
    if(is_array($value)){
        echo "$key : ".implode(' ' , $value).PHP_EOL;
    }else{
        echo "$key $value \n";
    }
}

?>