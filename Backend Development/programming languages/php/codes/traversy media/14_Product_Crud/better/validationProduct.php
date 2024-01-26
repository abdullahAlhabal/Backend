<?php

$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];


$imagePath= $product['image'] ;
$image = $_FILES['image'] ?? null ;


if(!$title){
  $errors[] = 'Product Title is Required!';
}
if(!$price){
  $errors[] = 'Product price is Required!';
}

if(!is_dir('/images')){
  mkdir('/images');
}

if($image && $image['tmp_name']){

    if($product['image']){
        unlink(__DIR__ . '/public/' . $product['image']);
    }
    
    $imagePath= "images/" . randomString(8) . '/' . $image['name'];

    mkdir(dirname(__DIR__ . '/public/' .$imagePath));

    move_uploaded_file($image['tmp_name'] ,__DIR__ . '/public/' .$imagePath);

}


?>


