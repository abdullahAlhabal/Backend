# how I write this code !

## first of all , the front page 
it is sample , get the bootstrap5 starter template .
get the bootstrap5 form .
make two forms , one for login and the second for signup

## think about the database schema .
for Login we need the username and the password 
for Signup we need the username password and email 
for sure these fileds from `user` table inside our database , 
```SQL
CREATE TABLE users (
    id int(11) AUTO_INCREMENT PRIMARY KEY not null, 
    username TINYTEXT not null,
    password LONGTEXT not null,
    email TINYTEXT not null,
);
```

## then , in our HTML forms we need inputs for the require fileds .
- login  : username, password
- Signup : username, password, email
the action into includes files
- login  : includes/login.inc.php
- signup  : includes/signup.inc.php
and the method is `POST` because we submit sensitive information

- login form 
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
- Signup form 
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

## now , goes to includes folder which contain `login.inc.php` and `signup.inc.php`

- we need to make sure that the url get into the file by clicking the `sumbit` button. 
- fetching the data from the HTML Form and validate it.
- Signup.inc.php
```php
if(!isset($_POST['submit'])){
    header("location:./../index.php");
}else{
    $username = $_POST[''];
    $password = $_POST['password'];
    $passwordRe = $_POST['passwordRe'];
    $email = $_POST['email'];

    // validate 
    $errros = [];

    if(!$username){
        $errors [] = "Username is required!";
    }
    if(!$password){
        $errors [] = "password is required!";
    }
    if(!$passwordRe || $password !== $passwordRe){
        $errors [] = "passwordRe is required!";
    }
    if(!$email){
        $errors [] = "email is required!";
    }

    if(!empty($errors)){
        foreach($errors as $error){
            echo "$error";
        }
    }else{
        // signup here - instate the signupController.class.php
    }
}
```

## Create the classes 
- first we need to make a class to connect to the database, Dbh.class.php
```php
class Dbh{
    // dsn = mysql:host=localhost;port=3306;dbname=ooplogin | username = root | password = empty_string
    private string $host = "localhost";
    private string $port = 3306;
    private string $dbname = "ooplogin";
    private string $username = "root";
    private string $password = "";

    protected function connect() : PDO{
        $dsn = "host={$this->host};port={$this->port};dbname={$this->dbnam}";
       
        try{
        
        $pdo = new PDO($dsn, $this->username, $this->password);

        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        return $pdo ;
        }catch(PDOException $ex){
            echo sprintf();
            die();
        }
    }
}
```

- second we will make the `SignupController.class.php`
    - grab the data by using the __construct($username, $password, $passwordRe, $email);
    - we need to validate the data here , not in the include/signup.inc.php
    - we need to check the empty fileds, invalidUsername, invalidEmail, matchPassword, checkUser if is it already in the database, then sign up 
    - in order to do that , we need to create functions , function foreach case then function
```php
class SignupController extends Dbh{
    private string $username ;
    private string $password ;
    private string $passwordRe ;
    private string $email ;

    public function __construct($username, $password, $passwordRe, $email){
        $this->username = $username ;
        $this->password = $password ;
        $this->passwordRe = $passwordRe ;
        $this->email = $email ;
    }

    private function emptyInput(){
        $result ; 
        if(empty($this->username) || empty($this->password) || empty($this->passwordRe) || empty($this->email)){
            $result = true ;
        }else{
            $result = false ;
        }
        return $result ;
    }
    private function invalidUsername(){
        $result ; 
        if(!preg_match("/^[a-zA-Z0-9]*$/",$this->username)){
            $result = true ;
        }else{
            $result = false ;
        }
        return $result ;

    }
    private function passwordsMatch(){
        $result ; 
        if($this->password === $this->passwordRe){
            $result = true ;
        }else{
            $result = false ;
        }
        return $result ;

    }
    private function invalidEmail(){
        $result ; 
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $result = true ;
        }else{
            $result = false ;
        }
        return $result ;

    }
    private function usernameTakenCheck(){
        // the logic is in the Signup.class.php
    }
}
```
- we can refactoring the code a little bit 
```php
class SignupController extends Dbh{
    private string $username ;
    private string $password ;
    private string $passwordRe ;
    private string $email ;

    public function __construct($username, $password, $passwordRe, $email){
        $this->username = $username ;
        $this->password = $password ;
        $this->passwordRe = $passwordRe ;
        $this->email = $email ;
    }

    private function signup(){

    }

    private function handleErrors(){
        if($this->emptyInput())
            return "emptyInput";

        if($this->invalidUsername())
            return "invalidUsername";

        if($this->passwordsMatch())
            return "passwordsMatch";

        if($this->invalidEmail())
            return "invalidEmail";

        if($this->usernameTakenCheck())
            return "usernameTakenCheck";

    }

    private function emptyInput(){
        return (empty($this->username) || empty($this->password) || empty($this->passwordRe) || empty($this->email))
    }

    private function invalidUsername(){
        return !preg_match("/^[a-zA-z0-9]*$/",$this->username);
    }

    private function passwordsMatch(){
        return ($this->password === $this->passwordRe);
    }

    private function invalidEmail(){
        return (!filter_var($this->email,FILTER_VALIDATE_EMAIL));
    }

    private function usernameTakenCheck(){
        // the logic below 
        // return $this->checkUser($this->email, $this->username);
    }
}
```

## think about Signup.class.php to complete the SignupController.class.php
here we want to interact with database to make sure that there aren't any user with the same input of (username, email).
- create a class 
- extends from Dbh 
- make the connection to the database 
- write the SQL statement to check that there no records have the same username or password
```SQL
SELECT COUNT(*) FROM users WHERE username = :username OR email = :email;
```
- prepare the statemnt and bind the values.
- execute the statement.
- try catch any exception.
- return true of there are no records.
- if there are any exception , set the statement to null and exit() the request.  

```php
class Signup extends Dbh{

    public function checkUser($email, $username){
        
        $sql = "SELECT COUNT(*) FROM users WHERE username = :username OR email = :email;";

        $stmt = $this->connect()->prepare($sql);

        $stmt->bindValue(":email",$this->email);
        $stmt->bindValue(":username",$this->username);

        try{
            $stmt->execute();

            $count = $stmt->fetchColumn();

            return $count === 0 ;

        }catch(Exception $e){
            header("location:./../index.php?error=".urlencode($e->getMessage()));
            exit();
        }finally{
            $stmt = null;
        }

    }

}
```
Now we can use this method in the `SignupController.class.php` as `usernameTakenCheck()`
```php
private function usernameTakenCheck(){
    return $this->checkUser($this->username, $this->email);
}
```

and the code should look like : 
```php
class SignupController extends Signup{
    private string $username ;
    private string $password ;
    private string $passwordRe ;
    private string $email ;

    public function __construct($username, $password, $passwordRe, $email){
        $this->username = $username ;
        $this->password = $password ;
        $this->passwordRe = $passwordRe ;
        $this->email = $email ;
    }

    private function signup(){
        $errorType = $this->handleErrors();
        if($errorType !== true){
            header("location:./../index.php?error={$errorType}");
            exit();
        }

        // if there are no errors , we will signup the user by using the setUser() in Signup.class.php
        $this->setUser();

    }

    private function handleErrors(){
        if($this->emptyInput())
            return "emptyInput";

        if($this->invalidUsername())
            return "invalidUsername";

        if($this->passwordsMatch())
            return "passwordsMatch";

        if($this->invalidEmail())
            return "invalidEmail";

        if($this->usernameTakenCheck())
            return "usernameTakenCheck";

        return true ;
    }

    private function emptyInput(){
        return (empty($this->username) || empty($this->password) || empty($this->passwordRe) || empty($this->email))
    }

    private function invalidUsername(){
        return !preg_match("/^[a-zA-z0-9]*$/",$this->username);
    }

    private function passwordsMatch(){
        return ($this->password === $this->passwordRe);
    }

    private function invalidEmail(){
        return (!filter_var($this->email,FILTER_VALIDATE_EMAIL));
    }

    private function usernameTakenCheck(){
        // the logic below 
        // return $this->checkUser($this->email, $this->username);
    }
}
```

## now we will make the setUser() method in The Signup.class.php

```php
protected function setUser($username, $password, $email){
    $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email);";

    $stmt = $this->connect()->prepare($sql);

    // hash the password 
    $hashedPassword = password_has

    $stmt->bindValue(":username", $username);
    $stmt->bindValue(":password", $password);
    $stmt->bindValue(":email", $email);

    try{
        $stmt->execute();
    }catch(Exception $ex){

        header("location:./../index.php?error=".urlencode($e->getMessage()));
        exit();

    }finally{
        $stmt = null;
    }

}
```