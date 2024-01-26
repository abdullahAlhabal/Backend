<?php 

/** @var $pdo \PDO */
require_once "../../database.php";
require_once "../../functions.php";

$id = $_GET['id'] ?? null ;

if(!$id){
    header('location: index.php');
    exit;
}

$statement = $pdo->prepare("SELECT * FROM products WHERE id = :id");

$statement->bindValue(':id' , $id);
$statement->execute();

$product = $statement->fetch(PDO::FETCH_ASSOC);

$errors = [];

$title = $product['title'];
$price = $product['price'];
$description = $product['description'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  include_once "../../validationProduct.php";

  if(empty($errors)){
    
    $statement = $pdo->prepare("UPDATE products SET title = :title , 
                                        image = :image,
                                        price = :price,
                                        description = :description
                                        WHERE id = :id
                                        ");

    $statement->bindValue(':id' , $id);
    $statement->bindValue(':title',$title);
    $statement->bindValue(':image',$imagePath);
    $statement->bindValue(':description',$description);
    $statement->bindValue(':price',$price);
    
    $statement->execute();

   
    header('location: index.php');

  }
}
?>

<?php include_once "../../views/partials/header.php"?>

  <p>
      <a href="index.php" class="btn btn-default">Back to products</a>
  </p>

  <h1>Update Product: <b><?php echo $product['title'] ?></b></h1>

  <?php include_once "../../views/products/form.php" ?>

<?php include_once "../../views/partials/footer.php"?>