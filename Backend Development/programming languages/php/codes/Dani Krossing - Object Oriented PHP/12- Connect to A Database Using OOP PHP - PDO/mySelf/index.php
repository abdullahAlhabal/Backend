<?php 

$pdo = new PDO("mysql:host=localhost;port=3306;dbname=testOOP", "root", "");

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

// $SetStatement = $pdo->prepare("INSERT INTO texts (statement) VALUES (:statement) ");

// foreach (range(0,1) as $i){
//     $message = $i . " - hay there!\n";
//     $SetStatement->bindValue(":statement",$message);
//     $SetStatement->execute();
// }

$fetchStatement = $pdo->prepare("SELECT * FROM texts ORDER BY statement ASC");

$fetchStatement->execute();

$texts = $fetchStatement->fetchAll(PDO::FETCH_ASSOC);

foreach ($texts as $i => $text){
    echo sprintf(" %d : %s\n" , $i , $text['statement']);
}



?>
