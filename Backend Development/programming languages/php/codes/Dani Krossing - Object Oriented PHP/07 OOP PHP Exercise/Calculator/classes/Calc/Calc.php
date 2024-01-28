<?php

namespace Calc;

class Calc{

    public float $num1 ;
    public string $op ;
    public float $num2 ;

    // we have made the type hinting , typing Declaration , so that we need to cast the parameters when we instant a new class 
    public function __construct(float $num1 ,string $op ,float $num2){
        $this->num1 = $num1;
        $this->op = $op;
        $this->num2 = $num2;
    }

    public function calculate(){
        switch ($this->op) {
            case "add":
                $resutl = $this->num1 + $this->num2;
                return $resutl;            
            case "sub":
                $resutl = $this->num1 - $this->num2;
                return $resutl;            
                
            case "mult":
                $resutl = $this->num1 * $this->num2;
                return $resutl;            
                
            case "div":
                $resutl = $this->num1 / $this->num2;
                return $resutl;            
            default:
                echo "Error!";
                break;
        }
    }

}

?>
