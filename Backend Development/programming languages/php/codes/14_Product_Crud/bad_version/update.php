<?php 
// dsn data source name 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products','root','');

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);


?>