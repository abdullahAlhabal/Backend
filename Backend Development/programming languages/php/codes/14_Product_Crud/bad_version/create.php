<?php 


$pdo = new PDO('mysql:host=localhost;port=3306;dbname=products_crud', 'root' , '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//  title=&description=Write+Description+here+...&image=&price=
//  the query string : start with question mark (?) . and it's basically key=value pairs , Separated by the and(&) statemnet .

// when passing information using GET method , we have the query string 

// if we want to pass some sensitive informatoin like the username and password , we shouldn't use GET 

// we shouldn't use GET when we want to make some changes in the database 

// GET will be a good example if we want to make a search for 

// and it's in the URL , so when we submit the form using GET the parameters are in the URL , 


// Super Global like :  , $_COOKIE , $_ENV , $_FILES , $_GET , $_POST , $_REQUEST , $_SERVER , $_SESSION

// $_GET

// echo '<pre>';
// echo var_dump($_SERVER['REQUEST_METHOD']);
// echo '</pre>';
// exit;

/*
array(4) {
  ["title"]=>
  string(0) ""
  ["description"]=>
  string(26) "Write Description here ..."
  ["image"]=>
  string(0) ""
  ["price"]=>
  string(0) ""
}
*/

// $title = $_POST['title'];
// $description = $_POST['description'];
// $image = $_POST['image'];
// $price = $_POST['price'];
// $date = date('Y-m-d H:i:s');

// $pdo->prepare('INSERT INTO proudcts ( title, image, price,description, create_date) VALUES ()');

// $pdo->prepare("INSERT INTO products ( title, image, description, price, create_date) 
//                       VALUES ( '$title', '', '$description', $price, '$date' )
// ");

// " '' " 
# when we make INSERT into the database , everything must be a string . - $preice : it can't be string 
# some developers do 

/*```

$pdo->exec("INSERT INTO products ( title, image, description, price, create_date) 
                      VALUES ( '$title', '', '$description', $price, '$date' )
");
```*/

# this exec( query ) : take the query and runs it directly in the database , and we will see a record in the database , 
# but we shouldn't do this approach , just putting the concatenating variables with the query string , is very unsafe , because , however is filling up our form may provide SQL INJECTION code 
# and that can cause dropping your whole table or deleteing some data [bad things]
# we shouldn't do modifications of the database data using this exec() method and using the concatination : VALUES ('$title') ... 
# so use the prepare() method instead of exec() and using named parameters | the feature of PDO | 

// $statement = $pdo->prepare("INSERT INTO products ( title, image, description, price, create_date) 
//                       VALUES ( :title, :image, :description, :price, :date)
// ");

# then bind the values 
// $statement->bindValue(':title' , $title);
// $statement->bindValue(':image' , '');
// $statement->bindValue(':description' , $description);
// $statement->bindValue(':price' , $price);
// $statement->bindValue(':date' , $date);

# then execute the statement 
// $statement->execute();

// if we refresh the form , alot of errors becasue the $_POST array , when refresh the page , the $_POST array will be empty so it willn't have any of $_POST['title'] , $_POST['image'] ... etc 
# So we need to check if the Request method is POST , and to check the current request method in php , we have to use super global variable $_SERVER 

# file upload .
// echo "<pre>";
// var_dump($_FILES);
// echo "</pre>";
// exit;

# the $_FILE : give us the key of the input and the vlaue , the value is an array of key:value pair .
# the name of the file      : the original name of the file 
# the mime type             : the mime type 
# the tmp_name              : the tmp name is the "temporary path" , Whenever we upload a file  Apache  save this in a temporary diractory , we have one request to move 
#                             that file into a permanent storage , permanent folder and then the file will be deleted . 
#                             and in the database we have to put the location of the image , that we can use that location when render the file 
#                             we need to associate that this image is connected to that product in the database level and on the system file level

# 1- move that file to somewhere : 

# the size                  :


$errors = [];

// we can write these things immediately at the very top , but I want to show you the problem be

$title = '';
$price = '';
$description = '';

if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  $date = date('Y-m-d H:i:s');


  # if the value doesn't exist , empty string , falsible value , create an errors[] array and append the errors into it 


  if(!$title){
    $errors[] = 'Product Title is Required!';
  }
  if(!$price){
    $errors[] = 'Product price is Required!';
  }
  
  if(!is_dir('images')){
    mkdir('images');
  }


  # check the errors array if it's empty so we need to execute the statement 

  if(empty($errors)){

    $imagePath = '';
    # handle the image upload , check if the image is uploaded 
    $image = $_FILES['image'] ?? null ; // -> return an associative array of key:values pairs name , path , mime type , tmp , size  
    
    # if the image is exists , but and we need to make sure that the image is uploded not only the variable is exist , so check the tmp_name 
    if($image && $image['tmp_name']){
      # we have to save that image , use the move_uploaded_file() function  
      # move_uploaded_file() take two params , "from" and "to" , so from image tmp to the new path
      //  move_uploaded_file($image['tmp_name'],"./product.png");
      # in case there are more than one product , and thier image have the same name , in this case the latest one will overwrite 
      # so when we upload a file , we need to make sure that the path of that file should be unique for that product 

      # generate a random string  use the hard-coded functoins 
      $imagePath = 'images/'.randomString(8).'/'.$image['name'];
      # then create the dir 
      mkdir(dirname($imagePath));
      # and move the file to the dir 
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
    

    # handing uploading an image - super global variable $_FILES , and to tell the form that We will submit files , we need to provide the enctype attribute in the form tag .  enctype="multipart/form-data"
    

    // we don't want to save the record in the databases if the errors isn't empty 

    $statement->execute();

    # then redirect to home page index.php 

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