#### Connection to the database 

there are two ways to make connection to the databases connection in php
- mysqli
- pdo 
go with *$pdf* , is more powerful , it supports multiple databases and it's an object orianted. 

create an instance of the PDO class : 
```php 
$pdo = new PDO('dsn string','username','password');
```
explain :
- _*`DSN`*_ is the _*`data source name`*_ , defines the connection string to the databases , and it's look like <pre>```
DBMS:host=host;port=port_number;dbname=databases_name ```</pre>
    - the *`host`* is *`localhost`* . 
    - the `port` : we can see the port from `XAMPP` control pannel and the `default post ` of `mysql` is 3306 .
    - the `database name ` is that we create using `sql` | `phpmyadmin`.
- username : the user , in all cases if `"root"`.
- password : for `windows` users is empty password 
```php
$pdo = new PDO("mysql:host=localhost;port=3306;dbname=products_crud");
```
we actullay establish connection to the database , but we want to tell $pdo ,
what to do if the connection to the database not successfully done.
```php
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTOIN);
```

#### Super Global Variables.

there are some of the `Super Global Variables` like 
`$_COOKIE`,`$_ENV`,`$_FILES`,`$_GET`,`$_POST`,`$_REQUEST`,`$_SERVER`,`$_SESSION`,

#### $_GET , $_POST - super global variables .

when passing information using *GET* method , we have the *query string* .<br>
the *`query string`* : start with *_`question mark(?)`_* , and it's basically _`key=value`_ pairs , Separated by the *`and(&)`* .
```query string 
title=someTitle&description=Write+Description+here+...&image=&price=212
```

. if we want to pass some sensitive information like the *[`username`, `password`]* , we Shouldn't use *`GET`*

. *`GET`* will be a good example if we want to make a *`search for`* .

. *`GET`* it's in the `URL` , so when we submit the `form` using `GET`  

#### To Get the Request Method , we use the super global variable `$_SERVER`

```php
echo "<pre>";
echo var_dump($_SEVER['REQUEST-METHOD']);
echo "</pre>";
echo exit;
```

#### in case we need to `get` | `fetch` collection of data from the database .

- make the sql `statement` , `prepare` the `$pdo` and write the `statement` 
```php
$statement = $pdo->prepare(" SELECT * FROM products ORDER BY create_date DESC

");
```
- `execute` the statement 
```php
$statement->execute();
```
- `fetchall` the data and put them in a variable , like `products` , Fetches data from the result set and returns it as an associative array
```php
$prodcuts = $statement->fetchAll(PDO::FETCH_ASSOC)
```
- Then we can use the `$products` and loops it like 
```php and html
<?php foreach($products as $i => $product ): ?>
    # do some logic here like 
    <img src="<?php echo $product[`image`]?>" class="thump-image">
<?php endforeach; ?>
```

- in the table , we have section of `action` where we have button for `delete` | `Edit`
    - `Edit` will only open the `html form` so we can use `<a></a>` tag here and we should send the `id` of the `product` with the request as a `query string`  . <br>
    ```php
        <a href="update.php?=<?php echo product['id']?>" type="button" class="btn btn-sm btn-outline-primary d-inline" >Edit</a>
    ```
    - 'Delete' 
        - we cann't use the `button` without a `form`.
        - we cann't use the `<a></a>` tag , because we make a change in the database , so we need to use `HTTP POST METHOD` .
         whenever click the delete button redirect us into `delete.php` so we need to change it from `button` to `<a></a> tag` , and send the `id` of the `product` with it , as a `query string` .when we click this `button` , it make a change in the `database` , so it's better to do that with method `POST` , and in order to do that , we need to make a `form` and the `form` is a block level elemnet so we need to add a `bootstrap` calss `d-inline`.
        ```php
        <form action="delete.php" method="POST" class="">
            <!-- hidden input to send the `id` of the product with the `form` as an `input value` -->
            <input type="hidden" name="id" value="<?php echo $product['id']?>">
            <button type="submit" class="btn btn-sm btn-outline-danger d-inline"> Delete </button>
        </form>
        ```

# INDEX.PHP , THE FINAL CODE SHOULD LOOK LIKE . 

```php
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
                    <td>
                        <img src="<?php echo $product['image'] ?>" class="thump-image">
                    </td>
                    <td><?php echo $product['title'] ?></td>
                    <td><?php echo $product['price'] ?></td>
                    <td><?php echo $product['create_date'] ?></td>
                    <td>
                        <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary d-inline" >Edit</a>
                        <form action="delete.php" method="POST" class="d-inline">
                            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
              </tr>
            <?php endforeach; ?>

          </tbody>

        </table>

```

#### in case we need to `insert' data into the database .


- make the sql `statement` , `prepare` the `$pdo` and write the `statement` 
```php
$statement = $pdo->prepare(" INSERT INTO products ( title, image, price, description, create_date) VALUES ()
");
```
- when we make `INSERT` into the database , everything must be a string , $price : it can't be a string , so for that we need to get the `data` from the `HTML FORM` using `$_POST`  like this : 
```php
$title = $_POST[''];
$description = $_POST[''];
$price = $_POST[''];
$date = date('Y-m-d H:i:s');         // -> 2024-1-13 9:13:00 in this form
```
- then execute the `$pdo` statement . some developer do like this : 
```php
$pdo->exec(" INSERT INTO products ( title, image, price, description, create_date) VALUES ('$title', '', $price, '$description', '$date')
");
```
- this exec(qeury) : take the `query` and runs it directly in the `database` , and we will see a record in the database

but we shouldn't do this approach , just putting the concatenatoing variables with the query string , is very unsafe , because , however is `filling up` our `HTML FORM` may provide `SQL INJECTION` code .

and that can cause `dropping` the whole table or `deleting some data` 

we shouldn't do modifications of the database data using the `exec()` method and the `concatination`

so , use the `prepare()` method instead of `exec()` and using `named parameters` instead of `concatination` , then bind the values , and this is the `Feature of PDO` , then execute the statement .

```php
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$date = date('Y-m-d H:i:s');         // -> 2024-1-13 9:13:00 in this form


$statement = $pdo->prepare("INSERT INTO products ( title, image, description, price, create_date) 
                      VALUES ( :title, :image, :description, :price, :date)
");

$statement->bindValue(':title' , $title);
$statement->bindValue(':image' , '');
$statement->bindValue(':description' , $description);
$statement->bindValue(':price' , $price);
$statement->bindValue(':date' , $date);

$statement->execute();
```

- if we refresh teh `page` | `form` , alots of errors , because the `$_POST` array ,  when refresh the page will be empty so it won't have any of `$_POST['price']`, `$_POST['title']`, `$_POST['description']`.
so we need to check if hte REQUEST_METHOD is POST , and make sure that the Required filed are submited . and if it isn't submited we need  to 
    - show error message , may more than one filed are not submited , so we need an array to save the erros 
    - not run the execute() method , we don't want to save data to the database and this data are missing some values .
```php
# we need an array to save the erros
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');         // -> 2024-1-13 9:13:00 in this form

    # make sure that the Required filed are submited 
    if(!$title){
        $errors[] = 'Product Title is Required!';
    }
    if(!$price){
        $errors[] = 'Product Price is Required!';
    }

    # not run the execute() method , be make sure that the $errors array is empty using the empty() method in php

    if(empty($errors)){

        $statement = $pdo->prepare("INSERT INTO products ( title, image, description, price, create_date) 
                              VALUES ( :title, :image, :description, :price, :date)
        ");

        $statement->bindValue(':title' , $title);
        $statement->bindValue(':image' , '');
        $statement->bindValue(':description' , $description);
        $statement->bindValue(':price' , $price);
        $statement->bindValue(':date' , $date);

        $statement->execute();
    } 
}
```

- now , we need to create the  `HTML FORM` 
    - method is `POST`
    - action to the same page .
    - we need to provide a `CANCLE` button , redirect to the `index.php` . <br>
    ``` <a href="index.php" class="btn btn-success"> Cancle </a> ```
    - show all the erros in top of the `HTML FORM` by using <br>
    ```php
     <?php if(!empty($errors)): ?>
      <div class="alert alert-danger">
          <?php foreach($errors as $error): ?>
            <div><?php echo $error ?></div>
          <?php endforeach; ?>
      </div>
      <?php endif; ?> 
    ```
    - name the form inputs `name="title"`, `name="price"`, `name="image"` and choose the correct input type [ `text`, `number`, `file` ]
    - use the `textare` for the description 
    - we have an `image - file` so we need to add the `enctype` attribute in the `form` tag with the value of  `multipart/form-data`. <br>
    ``` <form action="create.php" method="post" enctype="multipart/form-data"> ```
    - when an error will happen , the `HTML FORM` won't submited , so we need to keep the old value of each filed in the `FORM` , by using the `value=""` attribuite . <br> 
    ```php 
    <input type="text" class="form-control" id="title"  placeholder="title" name="title" value="<?php echo $title?>">
    ```
    in order to do that , `$title` now , isn't declare in that scope , so we need to declare this variables in top of php code .
    - the code will look like : 
```php

# declare the variables to save the value of the input 
$title = '';
$price = '';
$description = '';


# we need an array to save the erros
$errors = [];

if($_SERVER['REQUEST_METHOD'] === 'POST'){
  
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $date = date('Y-m-d H:i:s');         // -> 2024-1-13 9:13:00 in this form

    # make sure that the Required filed are submited 
    if(!$title){
        $errors[] = 'Product Title is Required!';
    }
    if(!$price){
        $errors[] = 'Product Price is Required!';
    }

    # not run the execute() method , be make sure that the $errors array is empty using the empty() method in php

    if(empty($errors)){

        $statement = $pdo->prepare("INSERT INTO products ( title, image, description, price, create_date) 
                              VALUES ( :title, :image, :description, :price, :date)
        ");

        $statement->bindValue(':title' , $title);
        $statement->bindValue(':image' , '');
        $statement->bindValue(':description' , $description);
        $statement->bindValue(':price' , $price);
        $statement->bindValue(':date' , $date);

        $statement->execute();
    } 
}

<html>

    <?php if(!empty($errors)): ?>
    <div class="alert alert-danger">
        <?php foreach($errors as $error): ?>
            <div><?php echo $error ?></div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <p>
        <a href="index.php" class="btn btn-success"> Cancle </a>
    </p>

    <form action="create.php" method="post" enctype="multipart/form-data">
          
        <div class="form-group my-3">
            <label for="title">Product title</label>
            <input type="text" class="form-control" id="title"  placeholder="title" name="title" value="<?php echo $title?>">
        </div>
          
        <div class="form-group my-3">
            <label for="description">Product Description</label>
            <textarea name="description" id="" cols="30" rows="5" class=form-control><?php echo $description ?></textarea>
        </div>
            
        <div class="form-group my-3">
            <label for="image">Product Image</label>
            <input type="file"  id="image" name="image">
        </div>

        <div class="form-group my-3">
            <label for="price">Product Price</label>
            <input type="number" class="form-control" id="price" step=".01" placeholder="price" name="price" value="<?php echo $price ?>" >
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>

    </form>

</html>

``` 
- Handling the file , image 
    - using the `super global variable` - `$_FILE` return an associative array of files in the `request` each element in the array is an array of [ `name`,  `mime_type`,  `tmp_name`, `path`, `size`]
    - `tmp_name` : is the `"temporary path"` , whenever we upload a file , `Apache` save this in a temporary diractory , we have one request to move that file into a permanent storage , and in the database we have to insert the `location` of the image . then we can use that location when render the file 
    - we need to associate that : this `image` is connected to that `product` in the `database level` and on the `system file level` 
    - check if there is an file , in the `html` input file we named it as `image` so when need to search for `key=image` .<br>
    ```php
    $image = $_FILES['image'] ?? null ; // -> return an associative array of key:values pairs name , path , mime type , tmp , size  
    ```
    - make sure that the user submit a file , not just the record is getting from the `HTML FORM` , it means , make sure that the `image` input have a value by using . <br>
    ```php
    if($image && $image['tmp_name']){
        // do some logic here , create a name for the file and make a dir to save the files into it 
    }
    ```
    - we have to move the file from `tmp_name` into a new storage ( in our case new folder with `images` name in the dircotry ) so 
        - create a new dir , using <br>
        ```php
        mkdir('images');
        ```
        but , the form will be submited more than one time , so , we need to make the dir for one time only , check the dir if is exits by using the `is_dir()` method . <br>
        ```php
        if(!is_dir('images')){
            mkdir('images');
        }
        ```
        - after create a new `folder` to save images , we need to `move` the files into it , but if more than one user upload a file with the `same name` , the `latest` one will `overwrite` the olds , and this will remove all the images with the same name , so we need to create a `unique name` , we need to make sure that the `path` of that file should be `unique` for that `product`
            - using the current time approach
            - using a randoms string approach , we need to make a `function` retun a uniqe string , of length 8 chars from the character set [ `0->9`, `a->z`, `A->Z` ] . <br>
            ```php
            function randomString($n){
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $str = '';

                for($i= 0 ; $i < $n ; $i++){
                  $index = rand(0 , strlen($characters) - 1);
                  $str .= $characters[$index];
                }

                return $str;
            }
            ```
            - then using this function to randomly create a unique name for each product image
        - after create the `folder` , and the `function` , we need to create the new `imagePath` contain 
        
        `folder_name`/`random_string`/`file_original_name` 
        `images`/`randomString()`/`$image['name']` 

        then make the new dir ' that we have created with randomString() . <br>
        `mkdir(dirname($imagePath))`
        
        then move the file to the new path by using the move_uploaded_file( :from , :to) 
        ```php

        
        $imagePath = '';
        $image = $_FILES['image'] ?? null ;
        if($image && $image['tmp_name']){
            $imagePath = 'images/'.randomString(8).'/'.$image['name'];

        }
        mkdir(dirname($imagePath));
        move_uploaded_file($image['tmp_name' , $imagePath]);
        ```
- after handing the image and the whole form and execute the `$statement->execute()` . we need to redirect the page into the `index.page` , be using the `header()` method in php , and provide the location `index.php`
```php

    $statement->execute();
    header('location: index.php');
```

# CREATE.PHP , THE FINAL CODE SHOULD LOOK LIKE . 

```PHP
<?php 


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root' , '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$errors = [];

$title = '';
$price = '';
$description = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $date = date('Y-m-d H:i:s');

  if(!$title){
    $errors[] = 'Product Title is Required!';
  }
  if(!$price){
    $errors[] = 'Product price is Required!';
  }
  
  if(!is_dir('images')){
    mkdir('images');
  }

  if(empty($errors)){

    $imagePath = '';

    $image = $_FILES['image'] ?? null ; 
    
    
    if($image && $image['tmp_name']){
    
        $imagePath = 'images/'.randomString(8).'/'.$image['name'];

        mkdir(dirname($imagePath));
        
        move_uploaded_file($image['tmp_name'] , $imagePath);
    }
    
    $statement = $pdo->prepare("INSERT INTO products ( title, image, description, price, create_date)
                                      VALUES ( :title, :image, :description, :price, :date)
                  ");

    $statement->bindValue(':title',$title);
    $statement->bindValue(':image',$imagePath);
    $statement->bindValue(':description',$description);
    $statement->bindValue(':price',$price);
    $statement->bindValue(':date',$date);
    
    $statement->execute();

    header('location: index.php');
  }
}

function randomString($n){
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';

  for($i= 0 ; $i < $n ; $i++){
    $index = rand(0 , strlen($characters) - 1);
    $str .= $characters[$index];
  }
  return $str;
}
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

        <title>Create New Product</title>

      </head>

      <body>
        <h1> Product CRUD</h1>

      <?php if(!empty($errors)): ?>
      <div class="alert alert-danger">
          <?php foreach($errors as $error): ?>
            <div><?php echo $error ?></div>
          <?php endforeach; ?>
      </div>
      <?php endif; ?>

        <p>
          <a href="index.php" class="btn btn-success"> Cancle </a>
        </p>

        <form action="create.php" method="post" enctype="multipart/form-data">
          
            <div class="form-group my-3">
                <label for="title">Product title</label>
                <input type="text" class="form-control" id="title"  placeholder="title" name="title" value="<?php echo $title?>">
            </div>
          
            <div class="form-group my-3">
                <label for="description">Product Description</label>
                <textarea name="description" id="" cols="30" rows="5" class=form-control><?php echo $description ?></textarea>
            </div>
            
            <div class="form-group my-3">
                <label for="image">Product Image</label>
                <br>
                <input type="file"  id="image" name="image">
            </div>

            <div class="form-group my-3">
                <label for="price">Product Price</label>
                <input type="number" class="form-control" id="price" step=".01" placeholder="price" name="price" value="<?php echo $price ?>" >
            </div>

          <button type="submit" class="btn btn-primary mt-3">Submit</button>

        </form>

      </body>

    </html>
```

#### in case we need to `delete' data from the database .

- first , the  data source name 
- get the `id` from the `POST` method using the super gloval variable `$_POST`
- `prepare` the `sql` `statement` 
- bind the values 
- execute() the `statement` 
- `redirect` to the `index.php` page

```php
$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud' , 'root' , '');
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$id = $_POST['id'] ?? null;

if(!$id)
    header('location: index.php');

$statement = $pdo->prepare('DELETE FROM products WHERE id = :id');

$statement->bindValue(':id' , $id);

$statement->execute();

header('location : index.php');
```

#### in case we need to `edit' data from the database .

- it will look like the `index.php`
- first we need to search for the `id` in the request . <br>
```php
$id  = $_GET['id'] ?? null; 
if(!$id)
    header('location : index.php');
```
- after that , get the needed `product` from the database 
    - `$pdo` .
    - `$id` .
    - prepare the statement. 
    - bind the values .
    - execute the statement.
    - fetch the data `product`.
```php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products','root','');

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$id  = $_GET['id'] ?? null; 

if(!$id)
    header('location : index.php');

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id ');
$statement->bindValue(":id" , $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH::ASSOC);
```

- we will keep the code from `create.php` , the 'POST' and the `randomString()` function .
- we need to display the `image` in the `form` , so in the top of `form`
    - make sure that this product have an image 
```php
<?php if($product['image']):?>
    <img src="<?php echo $product['image']?>">
<?php endif;?>
```
- make a button to `GO BACK`  , before the `form`
```php
<p>
    <a href="index.php" class="btn btn-sm btn-outline-secondary" >go back to products </a>
</p>
```
- and populate the value , to use them in the `form`
```php
$title = $product['title'];
$descrption = $product['descrption'];
$price = $product['price'];
```
- we should delete the `create_date` 
- for handling the `file upload` 
    - first , we need to delete the old file 
    ```php
    if($product['image'])
        unlink($product['image']);
    ```
    - second , the `imagePath` if the image is already exists . <br>
    ```php
    if($_SERVER('REQUEST_METHOD') === 'POST'){
        if(!empty($errors)){
            $imagePath = $product['image'];
            $image = $_FILES['image'];
            if($image && $image['tmp_name']){
                $imagePath = 'images/'.randomString(8).'/'.$image['name'];
                mkdir(dirname($imagePath));
                move_uploaded_file($image['tmp_name'] , $imagePath);
            }
        }
    }
    ```
    - the old image will be deleted after check is there a new image so the following code . <br>
    ```php
    if($product['image'])
        unlink($product['image']);
    ```
    should be inside the  `if($image && $image['tmp_name'])`.
    
- and we should `UPDATE` from the `database` , not `INSERT` into it .
```php
$statement = $pdo->prepare(' UPDATE prodcuts SET title = :title, 
                description = :description, 
                price = :price, 
                image = :image, 
                WHERE id = :id 
');
$statement->bindValue(':id' , $id);
$statement->bindValue(':title' , $title);
$statement->bindValue(':description' , $description);
$statement->bindValue(':price' , $price);
$statement->bindValue(':image' , $imagePath);

$statement->execute();
```

# the final code for update.php should look like 

```php
<?php 

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products','root','');

$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$id  = $_GET['id'] ?? null; 

if(!$id)
    header('location : index.php');

$statement = $pdo->prepare('SELECT * FROM products WHERE id = :id ');
$statement->bindValue(":id" , $id);
$statement->execute();

$product = $statement->fetch(PDO::FETCH::ASSOC);

$errors = [];

$title = $product['title'];
$descrption = $product['descrption'];
$price = $product['price'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];

  if(!$title){
    $errors[] = 'Product Title is Required!';
  }
  if(!$price){
    $errors[] = 'Product price is Required!';
  }
  
  if(!is_dir('images')){
    mkdir('images');
  }

  if(empty($errors)){

    $imagePath = $product['image'];

    $image = $_FILES['image'] ?? null ; 
    
    
    if($image && $image['tmp_name']){
        // to make sure that the "form input -> image " have an uploaded image so we need to double check for $image['tmp_name'] 
        if($product['image'])
            unlink($product['image']);

        $imagePath = 'images/'.randomString(8).'/'.$image['name'];

        mkdir(dirname($imagePath));
        
        move_uploaded_file($image['tmp_name'] , $imagePath);
    }
    
    $statement = $pdo->prepare(' UPDATE prodcuts SET title = :title, 
                description = :description, 
                price = :price, 
                image = :image, 
                WHERE id = :id 
    ');
    $statement->bindValue(':id' , $id);
    $statement->bindValue(':title' , $title);
    $statement->bindValue(':description' , $description);
    $statement->bindValue(':price' , $price);
    $statement->bindValue(':image' , $imagePath);
    
    $statement->execute();

    header('location: index.php');
  }
}

function randomString($n){
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $str = '';

  for($i= 0 ; $i < $n ; $i++){
    $index = rand(0 , strlen($characters) - 1);
    $str .= $characters[$index];
  }
  return $str;
}
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

        <title>Edit <?php echo $product['title']?></title>

      </head>

      <body>
        <h1> Edit <?php echo $product['title']?></h1>

      <?php if(!empty($errors)): ?>
      <div class="alert alert-danger">
          <?php foreach($errors as $error): ?>
            <div><?php echo $error ?></div>
          <?php endforeach; ?>
      </div>
      <?php endif; ?>

        <p>
          <a href="index.php" class="btn btn-success"> Cancle </a>
        </p>

        <form action="update.php" method="post" enctype="multipart/form-data">
          
            <?php if($product['image']):?>
                <img src="<?php echo $product['image']?>">
            <?php endif;?>

          
            <div class="form-group my-3">
                <label for="title">Product title</label>
                <input type="text" class="form-control" id="title"  placeholder="title" name="title" value="<?php echo $title?>">
            </div>
          
            <div class="form-group my-3">
                <label for="description">Product Description</label>
                <textarea name="description" id="" cols="30" rows="5" class=form-control><?php echo $description ?></textarea>
            </div>
            
            <div class="form-group my-3">
                <label for="image">Product Image</label>
                <br>
                <input type="file"  id="image" name="image">
            </div>

            <div class="form-group my-3">
                <label for="price">Product Price</label>
                <input type="number" class="form-control" id="price" step=".01" placeholder="price" name="price" value="<?php echo $price ?>" >
            </div>

          <button type="submit" class="btn btn-primary mt-3">save the changes</button>

        </form>

      </body>

    </html>
```

#### in case we need to make `Search` in the database .

- in the `index.php` we will put a `form` with `input` to write the `search keywords` 
- the `action` to the same page , and the `method` is `GET` 
- so that we will use the `query string` to `get` the `search keywords` and `search` in the `mysql` database 
```php
<form action="index.php" method="post">
    <div class="input-group mt-3">
        <input class="form-control" name="search" type="text" placeholder="Search for products" value="<?php echo $search?>">
        <div class="input-group-append">
            <button type="submit" class="btn btn-outline-secondary"> Search</button>
        </div>
    </div>
</form>
```
- then , after we set `PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTOIN`, we check if there are `search` in the `query string`
```php
$search = $_GET['search'];
```
- if there are a `search keywords` then we need to search in the database 
- if there aren't `search keywords` then we get the whole `products`
```php
$search = $_GET['search'];
if($search){
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :search ORDER BY create_date DESC');
    $statement->bindValue(':search' , "%" . $search . "%");
    $statement->execute();
    $statement->fetchAll(PDO::FETCH_ASSOC);
}else{
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
    $statement->bindValue(':search' , "%" . $search . "%");
    $statement->execute();
    $statement->fetchAll(PDO::FETCH_ASSOC);
}
```
- we can make the code more better by doing 
```php
$search = $_GET['search'];
if($search){
    $statement = $pdo->prepare('SELECT * FROM products WHERE title LIKE :search ORDER BY create_date DESC');
    $statement->bindValue('',"%" . $search . "%");
}else{
    $statement = $pdo->prepare('SELECT * FROM products ORDER BY create_date DESC');
}
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
```
- then we can use it in the `index.php` in the `HTML TABLE` . 