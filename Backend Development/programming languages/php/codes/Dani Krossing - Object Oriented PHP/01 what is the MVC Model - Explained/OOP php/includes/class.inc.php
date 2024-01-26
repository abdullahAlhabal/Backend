<?php

// variables -> properties
// functions -> methods 

// start with Capital Letter
class NewClass{

    // Properties and methods goes here
    // How we actullay access stuff inside the class
    
    // create a property with access modifiers 
    public $info = "This is some info";

}

// instantiate a class, means creating object contains all the informating from the class 
$object = new NewClass();
var_dump($object);

?>