<?php

class Car{
    private string $color ; 


    public function __construct(string $color){
        $this->color = $color;
    }

    

    public function getColor():string{
        return $this->color;
    }


    public function SetColor(string $color):void{
        $this->color = $color; 
    }

}