<?php


/**
    this class "Visa" is only going to used if another class in our project need to use something from it

    in our case : classes/BuyProduct.php need something from "Visa" class, 
    we can make our Visa class to abstract class , because , we don't want to access anywhere but other classes 

    is a way to create some behavior for certain classes 
    access from other classes not directly by creating object of it 

    there are some rules : 
    - if we create an abstract class we can't access any properties or methods out of the child classes
    - use the 'abstract' keyword before 'class' keyword 
    - at least , an abstract class will have abstract method that we can't use it out of other classes 


class Visa {

    public function visaPayment(){
        return "perform payment\n";
    }
}



abstract class Visa{

    public function visaPayment(){
        return "perform a payment via Visa!\n";
    }
}


    - create an abstract  function , then all the classes that extends this clas , must have the same class 


abstract class Visa{

    public function visaPayment(){
        return "perform a payment via Visa!\n";
    }

    abstract public function getPayment();
}


    */

abstract class Visa{

    public function visaPayment(){
        return "perform a payment via Visa!\n";
    }

     abstract public function getPayment();
}