<?php

$firstname = $_POST["first"];

$conn = mysqli_connect("localhost","root","","databasename");
$sql = "SELECT * FROM names WHERE names_first = ? ";
$stmt = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($stmt,$sql)){
    mysqli_stmt_bind_param($stmt,"s",$firstname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    while($row = mysqli_fetch_assoc($result)){
        echo $row['names_first'] . " & " . $row['names_last'];
    }
}


$firstName = $_POST['first'];

// dsn
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=names', "root" , "");
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$statement =  $pdo->prepare("SELECT * FROM names WHERE names_first LIKE :firstname ORDER BY names_first DESC");
$statement->bindValue(':firstname', $firstName);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

?>