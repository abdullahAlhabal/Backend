<?php 

// Print current date 
echo date('Y-m-d H:i:s').PHP_EOL;


// Print yesterday 
echo date('Y-m-d H:i:s' , time() - 60 * 60 * 24).PHP_EOL;


// Different format : 
echo date('F j Y , H:i:s').PHP_EOL ;

// Parse data 
//date_parse('2024-01-04 08:16:45');  // give it a date , and it will return an array 

$parsedDate = date_parse('2024-01-04 08:16:45');    // 

print_r($parsedDate).PHP_EOL;
# year month day hour minute second [ fraction , warning_count , warnings , error_count , errors , is_localtime ]

// Parse date from form date_parse_from_format( the format , the date)

$dateString = ' January 4 2024 11:22:00';

$parsedDate = date_parse_from_format(' F j Y H:i:s' , $dateString );

print_r($parsedDate).PHP_EOL;

?>