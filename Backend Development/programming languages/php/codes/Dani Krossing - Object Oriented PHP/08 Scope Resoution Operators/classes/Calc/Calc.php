<?php

namespace Calc;

// Scope Resolution Operator (::)


// Here is the first class example !
class FirstClass{

    // Properties
    const EXAMPLE = "You can't change this!\n";
    protected $message = "this is a message from the firstClass\n";
    protected static $Staticmessage = "this is a static message from the firstClass\n";
    // when naming a constant , Naming Convention that we need to use
    // capitalized letters for naming constant 

    // Methods
    public static function test(){
        // $testing = "This is Test!\n";
        // return $testing;
        echo self::EXAMPLE;
        echo self::$Staticmessage;
    }
}

// Here is the first class example !

class SecondClass extends FirstClass{

    // Properties
    public static $staticProperty = "A Static Property!\n";
    public $message = "this is a public message from the secondClass\n";


    public function __construct(){
        echo $this->message;
        echo self::$staticProperty;
        echo $this->message;
        echo parent::$Staticmessage;
    }

    // Methods
    public static function anotherTest(){
        echo parent::EXAMPLE;
        echo self::$staticProperty;
    }
}
?>
