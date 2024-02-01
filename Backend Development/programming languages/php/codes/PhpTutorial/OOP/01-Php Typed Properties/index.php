<?php

class BankAccount {
    public float $balance = 0 ; 

    public function __construct(float $balance){
        $this->balance = $balance;
    }


}


$bankacc = new BankAccount(100);
$bankacc->balance = 11 ; 
echo $bankacc->balance;


// declare(strict_type = 1 )

/**
 * before using strict_type


class BankAccount {
    public float $balance = 0 ; 

    public function __construct(float $balance){
        $this->balance = $balance;
    }


}


$bankacc1 = new BankAccount(100);
$bankacc1->balance = 11 ; 
echo $bankacc1->balance;


$bankacc2 = new BankAccount("100"); // -> we have passed a string
$bankacc2->balance = 11 ; 
echo $bankacc2->balance;

  * it will work correctly 
 */


/**
 * before using strict_type

declare( strict_type = 1 );

class BankAccount {
    public float $balance = 0 ; 

    public function __construct(float $balance){
        $this->balance = $balance;
    }


}


$bankacc1 = new BankAccount(100);
$bankacc1->balance = 11 ; 
echo $bankacc1->balance;


$bankacc2 = new BankAccount("100"); // -> we have passed a string
$bankacc2->balance = 11 ; 
echo $bankacc2->balance;

  * it won't work correctly , because we have passed a string instead of float.
 */

?>
