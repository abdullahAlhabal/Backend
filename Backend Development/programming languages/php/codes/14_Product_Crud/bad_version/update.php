<?php 

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$id = $_GET['id'] ?? null ; 

if(!$id)
    header('location :index.php');

$statement = $pdo->prepare('SELECT * FROM prodcuts WHERE id = :id');
$statement->bindValue(':id' , $id);
$statement->execute();

$product = $statement->fetch(PDO::FETCH_ASSOC);

$title = $product['title'];
$description = $product['description'];
$price = $product['price'];

$errors = [] ;

if( $_SERVER['REQUEST_METHOD'] === 'POST'){
    
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    if(!$title){
        $errors[] = 'Product title is requried !';
    }

    if(!$price){
        $errors[] = 'Product price is requried !';
    }

    if(!is_dir('images')){
        mkdir('images');
    }

    if(empty($errors)){

        $imagePath = $product['image'];

        $image = $_FILES['image'] ?? null;

        if($image && $image['tmp_name']){

            if($prodcut['image'])
                unlink($prodcut['image']);

            $imagePath = 'images/'.randomstring(8).'/'.$image['name'];

            mkdir($imagePath);

            
            move_uploaded_file($image['tmp_name'] , $imagePath);
        }


        $statement = $pdo->prepare('UPDATE products SET 
                                        title = :title , 
                                        description = :description , 
                                        price = :price , 
                                        image = :image
                                        WHERE id = :id
        ');
        $statement->bindValue(':id' ,$id);
        $statement->bindValue(':price' ,$price);
        $statement->bindValue(':title' ,$title);
        $statement->bindValue(':description' ,$description);

        $statement->execute();

        header('location : index.php');

    }

}

function randomstring($n){

    $cahractersSet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $str = '';

    for($i = 0 ; $i < $n ; $i++){
        $index = rand(0 , strlen($cahractersSet) - 1);
        $str.=$cahractersSet[$index];
    }

    return $str ;

}


?>