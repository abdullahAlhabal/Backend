<?php

// put load_model function in a separate file load.php for example  
/**
    function load_model($class_name){
    $path_to_file = "models/" . $class_name . ".php";

    if(file_exists($path_to_file)){
        include_once $path_to_file;
    }
}
*/

// after create load.php file with load_model function 
require_once "load.php";
// but we face the same problem . until we will use the spl_autoload_regiester() , after that , we won't need to use the 
// load_model functions each time we create a new instant of a class only require the load.php file 


// load_model('Contact');
// load_model('another_class_name');
// load_model('another_class_name');
// load_model('another_class_name');

// in this case 

$contact = new Contact\Contact("abdullah@gmail.com");

echo Email\Email::sendEmail($contact->getEmail());


?>
