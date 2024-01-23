<?php

require_once "vendor/autoload.php";
use app\Email as Email;
use app\Person as Person;

$email = new Email();
$person = new Person();

// from https://packagist.org/packages/guzzlehttp/guzzle , the guzzlehttp/guzzle
$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://api.github.com/repos/guzzle/guzzle');

echo $response->getStatusCode(); // 200
echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'

?>