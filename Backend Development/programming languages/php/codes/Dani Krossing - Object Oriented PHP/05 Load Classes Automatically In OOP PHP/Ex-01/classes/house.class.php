<?php

class House{
    public $address ;
    public $number ;

    public function __construct($address , $number){
        $this->address = $address;
        $this->number = $number;
    }

    public function getAddress(){
        $address = "address is " . $this->address ;
        return $address ;
    }
    

}

?>