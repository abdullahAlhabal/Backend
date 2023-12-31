<?php

$string1 = "Hello Zura";
$string2 = "Hello Zura";

echo $string1."\n";
echo $string2."\n";

#   ------------------------

$name = "Zura";

$str1 = "Hello I am ".$name." and I am 23\n";

echo $str1;

# If we have double quotation , we can pass $variable in it
$str1 =  "Hello I am $name and I am 23\n";
$str2 =  'Hello I am '.$name.' and I am 23  ';


#   ------------------------
# String Concatenatoin 

echo "Hello"." World ". "and PHP!\n";

#   ------------------------
# String functions  

$string = "   Heelo World   " ;

echo "1  - " .strlen($string) ."\n";             // return the length of the string 
echo "2  - " .trim($string) ."\n";               // trim  : remove the white spaces from the beginning and the end of the string 
echo "3  - " .ltrim($string) ."\n";              // ltrim : remove the white spaces from the beginning of the string - remove form the left side and leaves the white spaces on the right side . 
echo "4  - " .rtrim($string) ."\n";              // rtrim : remove the white spaces from the end of the string - remove form the right side and leaves the white spaces on the left side .
echo "5  - " .str_word_count($string) ."\n";     // print the number of words in that string 
echo "6  - " .strrev($string) ."\n";             // reverses that string 
echo "7  - " .strtoupper($string) ."\n";         // convert every letters into an uppder case 
echo "8  - " .strtolower($string) ."\n";         // convert every letters into an lower case 
echo "9  - " .ucfirst($string) ."\n";            // convert the first letter into uppdercase
echo "10 - " .lcfirst($string) ."\n";            // convert the first letter into lowercase  
echo "11 - " .ucwords($string) ."\n";            // convert the first letters in each word into a uppercase 
echo "12 - " .strpos($string , 'world') ."\n";  // searches for "world" in the $string -> no-output
echo "13 - " .stripos($string , 'world') ."\n";  // str ignore pos -> searches for "world" in the $string and ignoring the case of the letters -> 10                
echo "14 - " .substr($string , 8 , 6) ."\n"; // substring : offset(the begin) , length(how many chars) , substr($string , 8 ) it take string[7] to the end of the string .
echo "15 - " .str_replace("World" ,"PHP" , $string) ."\n";      // ( search , replace , subject ) 
echo "16 - " .str_ireplace("world" ,"PHP" , $string) ."\n";      // ( search , replace , subject ) with ignoring the letter case


#   ------------------------
# Multiline text and line breaks

$LongText ="
    Hello , my name is 
"


?>