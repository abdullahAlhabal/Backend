# before 

```php
<?php

// Interface is a blueprint : that we used in order to group 
// together specific classes to tell them how tehy should behave 

// work with different payments methods
class Paypal{
    public function payNow(){

    }
}

class Visa{
    public function payNow(){

    }

}

class Cash{
    public function payNow(){

    }

}


// create a class to actullay performs some sort of urh=chasa using one of the methods Paypal::payNow(), Visa::payNow(), Cash::payNow()

class BuyProduct{
    public function pay(Cash $paymentType){
        // grab one of the paymnets upthere and do the purchase 
        // in ordre to that , we have to set this up in a way where we 
        // can use this method latero on

        // we need to pass a payment type , with type hinting , 
        // 1- public function(Cash $paymentType){}
        // 2- public function(Visa $paymentType){}
        // 3- public function(Paypal $paymentType){}

         
    }
}

$paymentType = new Cash();
$buyProduct = new BuyProduct();
$buyProduct->pay($paymentType);

?>

```

# Implement the interface , using the implement keyword , then pass the Type Hinting  

```php
<?php

// Interface is a blueprint : that we used in order to group 
// together specific classes to tell them how tehy should behave 


interface PaymentInterface{
    public function payNow();
}

// work with different payments methods
class Paypal implements PaymentInterface { 
    public function payNow(){

    }
}

class Visa implements PaymentInterface {
    public function payNow(){

    }

}

class Cash implements PaymentInterface {
    public function payNow(){

    }

}


// create a class to actullay performs some sort of urh=chasa using one of the methods Paypal::payNow(), Visa::payNow(), Cash::payNow()

class BuyProduct{
    public function pay(PaymentInterface $paymentType){
        // grab one of the paymnets upthere and do the purchase 
        // in ordre to that , we have to set this up in a way where we 
        // can use this method latero on

        // we need to pass a payment type , with type hinting , 
        // 1- public function(Cash $paymentType){}
        // 2- public function(Visa $paymentType){}
        // 3- public function(Paypal $paymentType){}

         
    }
}

$paymentType = new Cash();
$buyProduct = new BuyProduct();
$buyProduct->pay($paymentType);

?>

```

# If any of the classes require a different action 'login' in order to complete the work , but the other two doesn't  

```php
<?php

// Interface is a blueprint : that we used in order to group 
// together specific classes to tell them how tehy should behave 


interface PaymentInterface{
    public function payNow();
}

// work with different payments methods
class Paypal implements PaymentInterface { 
    
    public function loginFirst(){
   
    }
    public function payNow(){

    }
}

class Visa implements PaymentInterface {
    public function payNow(){

    }

}

class Cash implements PaymentInterface {
    public function payNow(){

    }

}


// create a class to actullay performs some sort of urh=chasa using one of the methods Paypal::payNow(), Visa::payNow(), Cash::payNow()

class BuyProduct{
    public function pay(PaymentInterface $paymentType){
        // grab one of the paymnets upthere and do the purchase 
        // in ordre to that , we have to set this up in a way where we 
        // can use this method latero on

        // we need to pass a payment type , with type hinting , 
        // 1- public function(Cash $paymentType){}
        // 2- public function(Visa $paymentType){}
        // 3- public function(Paypal $paymentType){}
        $paymentType->loginFirst();
        $paymentType->payNow();
         
    }
}

$paymentType = new Paypal();
$buyProduct = new BuyProduct();
$buyProduct->pay($paymentType);

?>

```

### here is the problem , the `Interface` doesn't have the `loginFirst()` and in the 
### `BuyProduct` Class , we pass `PaymentInterface` Interface as a Type Hinting and `PaymentInterface` doesn't have `loginFirst`
