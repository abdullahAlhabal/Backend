# OOP PHP Login System 


## Front-end views . 

- grap the bootstrap starter template fomr [bootstrap 5](https://getbootstrap.com/docs/5.0/getting-started/introduction/).
- make a Html:5 home page in index.php 
```html
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <!-- <link rel="stylesheet" href=""> -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        </head>
        <body>

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">WebSite</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                      <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>    

            <div class="container my-5 d-flex ">


                <div class="col-md-6 mx-4">
                    <form action="./includes/signup.inc.php" method="post">
                        <legend>Signup</legend>
                        
                        <div class="mb-3">
                          <label for="username" class="form-label"> Username </label>
                          <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
                        </div>

                        <div class="mb-3">
                          <label for="password" class="form-label"> Password </label>
                          <input type="password" id="password" name="password" class="form-control" placeholder="password">
                        </div>

                        <div class="mb-3">
                          <label for="repetedPassword" class="form-label"> Repeted Password </label>
                          <input type="password" id="repetedPassword" name="passwordrepeat" class="form-control" placeholder="Re-Enter Password">
                        </div>

                        <div class="mb-3">
                          <label for="Email" class="form-label"> Email </label>
                          <input type="text" id="Email" name="email" class="form-control" placeholder="Enter Email">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="col-md-6 mx-4">
                    <form action="./includes/login.inc.php" method="post">
                        <legend>Login</legend>
                        
                        <div class="mb-3">
                          <label for="username" class="form-label"> Username </label>
                          <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
                        </div>

                        <div class="mb-3">
                          <label for="password" class="form-label"> Password </label>
                          <input type="password" id="password" name="password" class="form-control" placeholder="password">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

            </div>
        </body>
    </html>
```

- make a `html form` for `login` and for `signup` 
    - html form for `login` using the name attribute to pass data into the includes/login.inc.php
    ```html
    <form action="./includes/login.inc.php" method="post">
        <legend>Login</legend>

        <div class="mb-3">
          <label for="username" class="form-label"> Username </label>
          <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
        </div>  
        <div class="mb-3">
          <label for="password" class="form-label"> Password </label>
          <input type="password" id="password" name="password" class="form-control" placeholder="password">
        </div>  
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    ```
    - html form for `signup` 
    ```html 
    <form action="./includes/signup.inc.php" method="post">

        <legend>Signup</legend>

        <div class="mb-3">
          <label for="username" class="form-label"> Username </label>
          <input type="text" name="username" id="username" class="form-control" placeholder="Enter username">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label"> Password </label>
          <input type="password" id="password" name="password" class="form-control" placeholder="password">
        </div>

        <div class="mb-3">
          <label for="repetedPassword" class="form-label"> Repeted Password </label>
          <input type="password" id="repetedPassword" name="passwordrepeat" class="form-control" placeholder="Re-Enter Password">
        </div>

        <div class="mb-3">
          <label for="Email" class="form-label"> Email </label>
          <input type="text" id="Email" name="email" class="form-control" placeholder="Enter Email">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>

    </form>
    ```
- create a `includes` folder which contain `login.inc.php` and `signup.inc.php`
    - signup.inc.php
        - search for `submit` in `$_POST['submit']` if it doesn't contain `submit` , redirect back 
        - then grab the data 
        ```php
        if(!isset($_POST['submit'])){
            header('location:./../index.php');
        }else{
            $username = $_POST['username'];
            $password = $_POST['password'];
            $passwordRe = $_POST['passwordRe'];
            $email = $_POST['email'];

            // validate the data 
            $errors = []; 
            if(!$username){
                $errors [] = "Username is required" ;
            }
            if(!$password){
                $errors [] = "Password is required" ;
            }
            if(!$passwordRe || $password !== $passwordRe){
                $errors [] = "Password is required" ;
            }
            if(!$email){
                $errors [] = "Email is required" ;
            }

            if(!empty($errors)){
                foreach($errors as $error){
                    echo sprintf("Error : %s",$error);
                }
            }else{
                // here we need to instantiate an object of signupController 
                $signupContr = new SignupController();
                $signupContr-> some_method_here ;
                // we need to make that the username and email are unique 
            }
        }
        ```
    - login.inc.php
        - search for `submit` in `$_POST['submit']` if it doesn't contain `submit` , redirect back 
        - then grab the data 
        ```php
        if(!isset($_POST['submit'])){
            header('location:./../index.php');
        }else{
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            // validate the data 
            $errors = []; 
            if(!$username){
                $errors [] = "Username is required" ;
            }
            if(!$password){
                $errors [] = "Password is required" ;
            }

            if(!empty($errors)){
                foreach($errors as $error){
                    echo sprintf("Error : %s",$error);
                }
            }else{
                // here we need to instantiate an object of LoginController 
                $LoginContr = new LoginController();
                $LoginContr-> some_method_here ;
                // we need to make sure that the email and password are exists in the database
            }
        }
        ```
- create a `classes` folder which contain `login.class.php` and `signup.class.php` then and `loginController.class.php` and `signupController.class.php` .
    - `signup.class.php` will connect to the database and directly interact with it , validate the data before store it 
    ```php
    class Signup{
        private $usernmae ;
        private $password ;
        private $passwordRe ;
        private $email ;


        public function __construct($usernmae, $password, $passwordRe, $email){
            $this->username = $username ;
            $this->password = $password ;
            $this->passwordRe = $passwordRe ;
            $this->email = $email ;
        }

        // make the validation rules 
        // 1- make sure that all the data are submited

        private function emptyInput(){
            $result ;
            if(empty($this->usernmae) ||  empty($this->password) ||  empty($this->passwordRe) ||  empty($this->email)){
                $result = false ;
            }else{
                $result = true ;
            }
            return $result ; 
        }
        
        // 2- make sure that the user name is valide by Regular Expresion

        private function invalidUsernname (){
            $result ;
            if(!preg_match("/^[a-zA-Z0-9]*$/",$this->username)){
                $result = false ;
            }else{
                $result = true ;
            }
            return $result ; 
        }

        // 3- make sure that the password and the passwordRe are matched

        private function (){
            $result ;
            if($this->password !== $this->passwordRe){
                $result = false ;
            }else{
                $result = true ;
            }
            return $result ; 
        }

        
        // 4- make sure that the emails are unique in the database 
        private function (){
            $result ;
            if(!$usernmae ||  !$password ||  !$passwordRe ||  !$email){
                $result = false ;
            }else{
                $result = true ;
            }
            return $result ; 
        }
    }
    ```     

## For The Database 
- create a new database under name `loginSys` 
    - run this SQL code 
    ```sql
    CREATE TABLE users (
	id int(11) AUTO_INCREMENT PRIMARY KEY NOT null,
    username TINYTEXT not null,
    password LONGTEXT not null,
    email TINYTEXT not null
    );
    ```
     
## create the Classes folder 
    - `dbh.class.php file` in the `Classes folder`