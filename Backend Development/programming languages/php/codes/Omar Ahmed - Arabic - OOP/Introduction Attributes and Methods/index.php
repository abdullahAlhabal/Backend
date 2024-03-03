<?php

declare(strict_types = 1 );

require_once "./Car.php";

$c = new Car();

// using the Instance 
$c->color = "Red";
$c->speed = 100 ;
$c->model = "2024";

echo PHP_EOL.$c->color.PHP_EOL;


$bmw = new Car();

$bmw->color = "White";
$bmw->speed = 100 ;

$bmw->turnOff();


// $c   Object
// Car  Class
// ()   constructer 