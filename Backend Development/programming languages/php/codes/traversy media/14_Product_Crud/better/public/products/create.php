<?php 

/** @var $pdo \PDO */
require_once "../../database.php";
require_once "../../functions.php";

$errors = [];

$title = '';
$price = '';
$description = '';

$product = [
  'image' => ""
];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  include_once "../../validationProduct.php";

  if(empty($errors)){
    
    $statement = $pdo->prepare("INSERT INTO products ( title, image, description, price, create_date)
                                      VALUES ( :title, :image, :description, :price, :date)
                  ");

    $statement->bindValue(':title',$title);
    $statement->bindValue(':image',$imagePath);
    $statement->bindValue(':description',$description);
    $statement->bindValue(':price',$price);
    $statement->bindValue(':date',date('Y-m-d H:i:s'));

    $statement->execute();

    header('location: index.php');
  }
}
?>


<?php include_once "../../views/partials/header.php" ?>

        <h1> Product CRUD</h1>
        
      <p>
        <a href="index.php" class="btn btn-success"> Cancle </a>
      </p>

      <?php include_once "../../views/products/form.php" ?>
      
<?php include_once "../../views/partials/footer.php" ?>
