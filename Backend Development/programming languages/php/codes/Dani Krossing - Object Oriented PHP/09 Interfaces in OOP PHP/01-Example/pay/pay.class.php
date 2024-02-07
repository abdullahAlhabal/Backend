<?php

// Interface is a blueprint : that we used in order to group 
// together specific classes to tell them how tehy should behave 


interface PaymentInterface{
    public function payNow();
}

interface LoginInterface{
    public function loginFirst();
}

// work with different payments methods
class Paypal implements PaymentInterface, LoginInterface { 
    
    public function loginFirst(){
   
    }
    public function payNow(){

    }

    public function paymentProcess(){
        echo "paymentProcess() from Paypal\n";
        $this->loginFirst();
        $this->payNow();
    }
}

class Visa implements PaymentInterface {
    public function payNow(){

    }
    
    public function paymentProcess(){
        echo "paymentProcess() from Visa\n";
        $this->payNow();
    }

}

class Cash implements PaymentInterface {
    public function payNow(){

    }
    
    public function paymentProcess(){
        echo "paymentProcess() from Cash\n";
        $this->payNow();
    }
}

class BankTransfer implements PaymentInterface, LoginInterface{
    public function loginFirst(){

    }
    public function payNow(){

    }

    public function paymentProcess(){
        $this->loginFirst();
        $this->payNow();
    }
}


// create a class to actullay performs some sort of urh=chasa using one of the methods Paypal::payNow(), Visa::payNow(), Cash::payNow()

class BuyProduct{
    public function pay(PaymentInterface $paymentType){
        // grab one of the paymnets upthere and do the purchase 
        // in ordre to that , we have to set this up in a way where we 
        // can use this method later on

        // we need to pass a payment type , with type hinting , 
        
        // 1- public function(Cash $paymentType){}
        // 2- public function(Visa $paymentType){}
        // 3- public function(Paypal $paymentType){}

        $paymentType->paymentProcess();
         
    }

    public function onlinePay(LoginInterface $paymentMethod){
        $paymentMethod->paymentProcess();
    }
}

$paymentType = new Paypal();
$buyProduct = new BuyProduct();
$buyProduct->pay($paymentType);


// Interfaces is basically a way for us to create blueprint that 
// we can then implement into classes in order for classes to follow a specific set of 
// rules , meaning it makes it easier to name things in the same way 
// throughout all the different classes if they
// have the same functionalities 
// It's a way for us to reference to a group of classes if 
// we want to use them inside a separate method like `type declaration`


?>
