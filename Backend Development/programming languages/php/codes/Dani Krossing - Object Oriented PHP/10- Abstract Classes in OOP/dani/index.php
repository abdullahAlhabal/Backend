<?php

include_once "./abstract/paymenttypes.php";
include_once "./classes/BuyProduct.php"; 

$buyProduct = new BuyProduct();
$res = $buyProduct->getPayment();
echo $res;