<?php 

// Magic constants 
echo __DIR__.PHP_EOL;    // will print the current directory - where this file is located  
echo __FILE__.PHP_EOL;   // will print the current file - from which we print 
echo __LINE__.PHP_EOL;   // will print the line .   //  => 6 

// Create directory using the mkdir('directory_name') 
// mkdir('test');  // we need to give the name of the directory . 


// Rename directory using the rename('old_directory_name' , 'new_directory_name')
// rename('test' , 'test2');

// Delete directory using the rmdir('exists_dir');
// rmdir('test2');

// Read files and folder inside directory
echo "Read files and folder inside directory : scandir('./') : \n ".implode(" - ",scandir('./')).PHP_EOL;
// print_r (scandir('./'));
// echo implode(" - ",scandir('./'));

/*
Array(
    [0] => .            // indicates the current directory.
    [1] => ..           // indicates the parent  directory. 
    [2] => index.php
    [3] => lorem.txt
)
*/



// file_get_contents , file_put_contents
echo "file_get_contents : file_get_contents('./lorem.txt') : \n ".file_get_contents('./lorem.txt').PHP_EOL;

# how to write content inside a file 
file_put_contents('sample.txt' , 'Some Content');   // it will create the sample.txt file and we will see 'content' , append 

// file_get_contents from URL

$userJson = file_get_contents('https://jsonplaceholder.typicode.com/users');
echo $userJson;
// nicer way , this is the user json fatched from the json placeholder website .

/**
 JSON 
 * basically is : a type(way) how to data can be exchanged and how the data can be stored .
 */

// in php we have the possibility to convert that json data into an array using the json_decode(); it will convert is into an associative array

$users = json_decode($userJson);

print_r($users);


// some functions about file-system

# to check if the specific file exists or not 
echo "check if the specific file exists or not using the file_exists() : \n ".file_exists('lorem.txt').PHP_EOL;

# to check if the specific folder is a directory or not 
echo "check if the specific folder is a directory or not using the is_dir() : \n".is_dir('lorem.txt`').PHP_EOL;

?>

