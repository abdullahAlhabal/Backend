<?php 
// there are two ways to make connection to the databases mysqli and pdo connection in php
# go with $pdf , is more powerful , it supports multiple databases , it's object orianted 
# 1- create an instance of the PDO class : $pdo = new PDO('dsn sting : defines the connection string to the database mysql:host=localhost;port:3306 the default port of mysql ;the database name dbname=products_crud' , 'the user and in all cases is root', 'the password and for windows usrs is empty password');
# we can see the port from Xampp control pannel 
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
# ('mysql:host=;port=;dbname=' , 'root' , '') .
# using this line of code , we actullay already establish connection to the database , but we want to tell $pdo what to do if the connection to the database not successfully done. 
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');

$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC); // i want to each record inside the table to be fetched as an asscoiative array  


echo '<pre>';
echo "<h1> We are herr ! </h1>";
var_dump($products);
echo '</pre>';

/*
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
// mysql: hots=localhost;port=; dbnam=
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
 */
?>

<!doctype html>
    <html lang="en">
      <head>

          <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="app.css">

        <title>Product CRUD</title>

      </head>

      <body>

        <!-- get table design from Bootstrap -->
        <table class="table">

          <thead>

            <tr>
              <th scope="col">#</th>
              <th scope="col">Image</th>
              <th scope="col">Title</th>
              <th scope="col">Price</th>
              <th scope="col">Create Date</th>
              <th scope="col">Action</th>
            </tr>

          </thead>

          <tbody>

            <?php foreach($products as $i => $product):?>
              <tr>
                <th scope='row'> <?php echo $i ?> </th>
                <td><?php echo $product['image'] ?></td>
                <td><?php echo $product['title'] ?></td>
                <td><?php echo $product['price'] ?></td>
                <td><?php echo $product['create_date'] ?></td>
                <td>
                  <button type="button" class="btn btn-sm btn-outline-primary">Edit</button>
                  <button type="button" class="btn btn-sm btn-outline-danger">Delete</button>
                </td>
              </tr>
            <?php endforeach ?>
            
            
          </tbody>

        </table>

      </body>

    </html>