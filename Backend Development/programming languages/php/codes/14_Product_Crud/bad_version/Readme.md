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


#### in case we need to `INSERT' data into the database .


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

# THE FINAL CODE SHOULD LOOK LIKE 

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