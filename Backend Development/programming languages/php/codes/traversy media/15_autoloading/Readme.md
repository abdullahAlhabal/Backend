# Namespaces 

### what are namespaces and why they are necessery 

- `Name Collision` :
    name collisoin in `php` occurs when two or more elements within a program sharte the same name but have different scopes or meaning , This can lead to
    unexpected behavior and errors in the code 
    ```php
        $counter = 10; 
        function incrementCounter(){
            $counter = 5 ; 
            $counter++ ;
            echo "Local Counter : $counter";
        }

        incrementCounter();

        echo "Global Counter : $counter" ;
        ?>
    ```
    the output :
    ```php
    6
    10
    ```
    the local `$counter` variable inside the function "`shadows`" (`takes precedence over`) the global `$counter` variable within the function's scope. This situation is a form of `name collision`, where the same name is used for different variables in `different scopes`.

- in general it's a `good practice` to all our `source code` in a `namespace` called `app` 

- if we have Three classes in our `project`  Class Email ,
Class Person , Class Order , 
and we decided to implement the email sending and in order to do that we need to install third `3rd` party `package` in our `project` , and that `3rd party package` also have `Class Email` in its `source code` so , we have name collision between our email class and that email class , 

- in general it's a `good practice` to all our `source code` in a `namespace` called `app` 
when we put all our classes in `namespace` called `app` , then the identifier of the class isn't just `Email` , `Person` and `Order` , but it's `app\Email`,`app\Person`, and `app\Order` 

- after doing that , if we try to install the 3rd party package in our application which has class Email , it won't `conflict` our email class , because , our Email class is in different name space , and its full identifier is `app\Email`

- `Folders` can be the namespace , and class name can be the `files` , we can't have two files with the same name in a single `folder`

# Autoloading

### what are autoloading and why they are necessery 


- installing `composer` and see what is the `autoloading`

- in order to have `autoloading` working we need to have `composer` installed 

- after download and install the `composer` we be ably to use `composer commands` from the `command line` 

```composer
composer
```

- open `15_autoloading` and create two Class 
    we need to generat `composer.json` file in `15_autoloading` , by initialize composer using the following command 
    ```bash
    composer init
    ```
    and we will leave everythings `questions` as `default` 
- now we should see the `composer.json` file , and inside it we see the `require` here , we write down all the dependencies the current package has , we want to enable the `autoloading`
    - specify the `autoload`
    - specify the standers using which we need that `autoload` the stander is `psr-4`
    - we have to specify the `namespace` and we will set it `app\` 
    - the `directory` which `corresponds` to the `namespace`
    
    ```json
        "autoload" : {
            "psr-4": {
                "app\\": "./app"
            }
        }
    ```
    - the stander is   : `psr-4` 
    - the namespace is : `app\`
    - the directory is : `./app`
    - so in order to do that , we need to make a `directory` which called `app` in the current path , and move the `Email`, `Person` classes into it , 
    - after move the Classes , we specify the namespace inside each Class 
    - Email.php
    ```php
        class Email{
            public function __construct(){
                echo "Email Class Here".PHP_EOL;
            }
        }
    ``` 
    - Person.php
    ```php
        class Email{
            public function __construct(){
                echo "Email Class Here".PHP_EOL;
            }
        }
    ```
    - Email.php
    ```php
        namespace app;

        class Email{
            public function __construct(){
                echo "Email Class Here".PHP_EOL;
            }
        }
    ``` 
    - Person.php
    ```php
        namespace app;
        
        class Email{
            public function __construct(){
                echo "Email Class Here".PHP_EOL;
            }
        }
    ```
    - and in the `index.php` 
    ```php
        <?php
        require_once "Email";
        require_once "Person";

        $email = new Email();
        $person = new Person();
        ?>
    ```
    this will give us an Errors , becuase the Email and Person Classes doesn't exists any more without the namespace ./app , so
    ```php
        <?php
        require_once "app\Email";
        require_once "app\Person";

        $email = new app\Email();
        $person = new app\Person();
        ?>
    ```
    - this will work fine and we can make it better by using the `use` and `as` keywords.
    - index.php
    ```php
    <?php
        require_once "app\Email";
        require_once "app\Person";

        use app\Email as Email;
        use app\Person as Person;

        $email = new Email();
        $person = new Person();
        ?>
    ``` 

- Implement the `Autoloading`
imagine that our `project` get `larger` and we have `hundreds` of class and the class are just depended on each other 
then we have to write `require_once "class_name"` whenever we need that class , `autoloading` give us the possibility to aviod 
writing this `require_once` for class, interface and traits , `advanced` part of `OOP` in php ,
, in the `composer.json` we have specifiy the `autoload psr-4` , and we need to run 
```bash
compoesr update
``` 
when we do this `bash command` , compser will create `vendor` directory ,
```bash
cd 15_auotloading
composer update
```
then inside the `vendor` folder , `composer` will create `autoloading.php` , which be the reponsible for autoloading all our class and we won't need to 
write `require_once` for any other class , we just only `include(require)` that `aoutload.php`
- the composer.json
```json
{
    "name": "path_to_project",
    "autoload": {
        "psr-4": {
            "app\\" : "./app"
        }
    },
    "authors": [
        {
            "name": "@name_here",
            "email": "@email_here"
        }
    ],
    "require": {}
}

```
- the index.php 
```php
<?php

require_once "vendor/autoload.php";
use app\Email as Email;
use app\Person as Person;

$email = new Email();
$person = new Person();

?>
```

# Composer

### what is Composer and why we use it ? 

composer is a php `dependency management tool` and it gives the possibility to find some package and install it 
go to `packagist.org` is the `main repository` - `composer repository` 

- Install guzzle Http Client 
```bash
    composer require guzzlehttp/guzzle
```
where 
    - `guzzelhttp` is the `vendor name`
    - `guzzle` is the `package name`
    - and in the `packagist.org` in the `documentation` of `guzzlehttp/guzzle` 
    - we see how we will use it 

- in order to `push` the `local` to the `remotly` 
    - there are some folder and files we don't need to `push` them like 
        - `/vendor/`
            - this directory contains the Composer dependencies , as other developers can install the dependencies themselves by running
            ```bash
                composer require guzzlehttp/guzzle
            ```
        - `/.env`
            -   If you are using `environment configuration` files, you might want to exclude them, especially if they contain `sensitive information`.
        - `/.idea/` and `/.vscode/` 
            -   These directories are specific to `IDE` configurations (e.g., `PhpStorm` or `VS Code `). Including them in `version control` is generally not necessary.
        - `composer.lock`
            -   This file is generated by `Composer` and includes the `exact versions` of `dependencies` currently installed. It is usually committed to `version control` to ensure consistent installations across different environments
    ```gitignore
    /vendor/
    /.env
    /.vscode
    /.idea
    composer.lock
    ```
    
- after run
    
```bash
    composer requrie guzzlehttp/guzzle
```

- let's see what the `composer` did , for `guzzlehttp/guzzle` , the composer installed 6 six packages , first it analyze the dependency tree , and install the other packages  "the required packages" for the `guzzlehttp/guzzle` , then we can use that 
