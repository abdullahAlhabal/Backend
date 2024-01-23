# Product CRUD , Better version  

## Create the `Views` folder 
- create the `views` folder to move all the `doctype` files into it.
- create the `partials` folder in the `views` folder . 
- move the `header.php` and the `footer.php` file to `better/views/partials/`.
- so that , in the `index.php` , `update.php` and `create.php` we will use the `require_once` .
- in `header.php`
```php
<!doctype html>
    <html lang="en">
      <head>

          <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="app.css">

        <title>Create New Product</title>

      </head>

      <body>
```
- in `footer.php`
```php
</body>

</html>
```

## Connecting to the database 
- the following two lines is to connecting to the database , and it repeated in each folder 
```php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
```
- but for the code reusability ,if we want to changet the `port number` or the `dbname` , so we have to update the change in three different places , and it's not very good 
- create a new `php file` with the name `database.php` 
```php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud','root','');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
```
- then , require the `db.php` in the other filese `index.php` , `create.php` and `update.php` 
- we may notice that our `IDE` does not recognize the type of the `$pdo variable` and, as a result, may not provide accurate code `suggestions` or `type-checking`.
- it is recommended to use `PHPDoc comments` to explicitly specify the `type` of the `$pdo variable`. Add the following comment at the beginning of `index.php`
```php
/**  @var $pdo \PDO*/
$statement = $pdo->prepare("SELECT * FROM products ORDER BY create_date DESC");
$statement->execte();
$products = $statement->fetchall(PDO::FETCH_ASSOC);
```
- now , we want combining `create` and `update` forms into a single one , because if we want to add another `input` like `product address` we have to add the `input` in the two files 
- in order to do that , maybe the system get large and have other CRUDs like Categroy and so on , so in the `views` we need to create a new `folder` under the name of `products` 
- copy and paste codes between the files 
- after that , we also have code duplicatoin , inside `create.php` and `update.php` , most of the logic of `validatoin` and `upload an image` is the same .
- create a new file `validateProduct.php` 
  - this file will contain all the code for validation and handle the file upload 
  - if we see in the `create.php`
  ```php  
  $title = "";
  $description = "";
  $price = "";
  $date = date('Y-m-d H:i:s');

  $imagePath= "" ;
  $image = $_FILES['image'] ?? null ;

  $product = [
    'image' => ''
  ];

  if(!$title){
    $errors[] = 'Product Title is Required!';
  }
  if(!$price){
    $errors[] = 'Product price is Required!';
  }
  
  if(!is_dir('images')){
    mkdir('images');
  }

  if($image && $image['tmp_name']){
    
    if($product['image']){
      unlink($product['image']);
    }

    $imagePath = "images/" . randomString(8) . "/" . $image['name'];

    mkdir(dirname($imagePath));

    move_uploaded_file($image['tmp_name'] , $imagePath);

  }
  ```
  - and if we see the `update.php` file we will notice .
  ```php
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  $image = $_FILES['image'] ?? null ;
  $imagePath= $product['image'] ;


  if(!$title){
    $errors[] = 'Product Title is Required!';
  }
  if(!$price){
    $errors[] = 'Product price is Required!';
  }
  
  if(!is_dir('images')){
    mkdir('images');
  }

  if($image && $image['tmp_name']){
    
    if($product['image']){
      unlink($product['image']);
    }

    $imagePath = "images/" . randomString(8) . "/" . $image['name'];

    mkdir(dirname($imagePath));

    move_uploaded_file($image['tmp_name'] , $imagePath);

  }
  ```
  - we will notice , there are some code duplication , so , in the `validationProduct.php`
  ```php
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
  
  if(!is_dir('images')){
    mkdir('images');
  }
  
  if($image && $image['tmp_name']){
  
      if($product['image']){
          unlink($product['image']);
      }
      
      $imagePath= "images/" . randomString(8) . '/' . $image['name'];
  
      mkdir(dirname($imagePath));
  
      move_uploaded_file($image['tmp_name'] ,$imagePath);
  }
  ```
## more Refactoring 

- inside the `index.php` , we can access to `/db.php` , we can access to `/functions.php` and the `/validateProduct.php` 
- and it's a very bad practice to access the `files` through/from the browser , which shouldn't be accessible from the browser 
- we should move only the `files` only in a specific folder only the `files` should be `web accessible` 
- in the modern `Frameworks` , they exists in a `public` folder , and this `public` folder is only `web accessible` , maybe also called `web`
- move `create` , `delete` , `update` and `index` as only `web accessible` php files inside that `pubilc` folder
- inside the `public` folder , we also will create a subfolder , in order if our website get larger then we will have alot of `CRUDs` 
- adjust how we are requireing [`inclusion`] : so that , we need to modify the paths inside each one of `create` , `delete` , `update` and `index` , like the stylesheet and javascript and other links .

## Good Practice to be started in a `Virtual Host` 
- we create a `virtual host` and we run application in that `virtual host`
- a `simulation` of `virtual host` will be `php's built-in server` 
- open `terminal` , and go to the `public folder` , then we start the `php's built-in server` using 
```terminal
php -S localhost:8080
```
- then we can run the application , and we need to move the css files to that public folder and make a `absolute path` for files 
- move `app.css` to `/public` and in the `view/partials/header.php` the `<link href="app.css">` make it `<link href="/app.css">` .
- for uploaded `images` , in the `validationProduct.php` we save the `image` in the `relative`
- `validationProduct.php` 
```php
if(!is_dir('/images')){
  mkdir('/images');
}
```
- `views/products/form.php` 
```php
<?php if($product['image']):?>
  <img src="/<?php echo $product['image']?>" alt="image for <?php echo $product['title']?> " class="image-preview">
<?php endif;?>
```
- `views/partials/header.php` 
```php
  <link rel="stylesheet" href="/app.css">
```
- after that , when upload a new `image` , it will be uploaded in a different folder , because , in the `validationProduct.php`  
- when we do some operation with `file system` , we just specify a `relative path` 
- any path , given to a function works with `file system` , so any path basically is `relative` to the current file which is executed 
- 