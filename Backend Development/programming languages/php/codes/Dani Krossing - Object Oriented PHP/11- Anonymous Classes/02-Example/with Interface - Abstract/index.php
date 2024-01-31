<?php

interface Logger{
    public function log(string $message) : void ;
}

// Inheriting a Class

// create an abstract class `SimpleLogger` that implements the `Logger` interface , so that , it must have the `log` function
abstract class SimpleLogger implements Logger{
    
    protected $newLine ;
    public function __construct(bool $newLine){
        $this->newLine = $newLine;
    }

    abstract public function log(string $message):void ;

}


// anonymous class $logger1 extends from abstract class `SimpleLogger` so , it should contain the `log` method.

$logger1 = new class(true) extends SimpleLogger {
    
    public function __construct($newLine){
        parent::__construct($newLine);
    }

    public function log(string $message) : void{
        echo $this->newLine ? $message . PHP_EOL : $message ; 
    }

};

$logger2 = new class(false) extends SimpleLogger {
    
    public function __construct($newLine){
        parent::__construct($newLine);
    }

    public function log(string $message) : void{
        echo $this->newLine ? $message . PHP_EOL : $message ; 
    }

};


// to pass arguements we use () after `class` keyword in our anonymouse function 

$logger2->log("hello");
$logger1->log("hello");


?>