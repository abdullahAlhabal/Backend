<?php


class Car{
 
    // Attributes 
    public int $speed ;         // default 0
    public ?string $color ;      // default null
    public string $model ;      // default null
    public bool $isHatchBack;   // default false


    // default Constructor 

    public function __construct($color = null){
        $this->color = $color ; 
        echo "\nNew Car Created now , with color of {$this->color}";
    }

    // Methods
    public function turnOn():void{
        echo "\ncar is being turned on now\n";
    }

    public function break():void{
        echo "\nbreak\n";
    }
    
    public function turnOff():void{
        echo "\nturnOff\n";
    }

}   