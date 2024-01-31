<?php

include_once "./classes/simpleClass.php";

$simpleClass = new SimpleClass();
$simpleClass->helloWorld();

$obj = new class{
    public function hellowWorld(){
        echo "Hellow World! from Anonymous class\n";
    }
};

$obj->hellowWorld();


// In the Anonymous class , if we don't have __construct() in the class it is ok to not put () but 
// if we have a __construct() in the class It must to put () after the name of the class

$newObj = new class($name){
    public $name;
    
    public function __construct($name){
        $this->name = $name;
    }
    
    public function hellowWorld($name){
        echo "Hello World! $name from Anonymous class\n";
    }
};

$newObj->hellowWorld("Abdullah");
