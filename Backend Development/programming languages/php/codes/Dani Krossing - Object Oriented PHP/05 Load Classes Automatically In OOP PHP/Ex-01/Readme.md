# Load Classes Automatically in OOP PHP

every time we want to load a class inside our document `index.php` , we do need to include the class of every single document we want to load the class 
now , we do actually have a built-in function inside php , which automatically load class as soon as we instantiate a class inside our document 
we have class files , so we might need to change the directories to get more organized system and also for namespaces 
- create a new folder `class` , take all class files to put them in this folder 
- rename from `person.inc.php` into `person.class.php` .

## how we can load in our classes files without have to include them every single time 

using built-in function , that allow for us to look for a new instantiated class and pull it 
replace the following code .
```php
include 'includes/person.inc.php';
include 'includes/house.inc.php';
```
with , the built-in function 
```php
spl_autoload_register();
```
then create a function to `Auto load`
```php
function myAutoLoader($className){
    $path = "classes/";
    $exe  = ".class.php";
    $fullPath = $path . $className . $exe ; 

    inlcude_once $fullPath ; 
}
```
- then reference to this functions inside our `spl_autoload_register();`
```php
spl_autoload_register('myAutoLoader');
function myAutoLoader($className){
    $path = "classes/";
    $exe  = ".class.php";
    $fullPath = $path . $className . $exe ;

    include_once $fullPath ; 
}
```
- this was inside our `index.php` file ,
now we need to move it to a new file under name `includes/autoload.inc.php` , create a new folder and file 

so 
- goes from this inside our `index.php` with fileSystemStructure 
    - `index.php`
    - `includes/`
        - `person.inc.php`
        - `house.inc.php`
```php
include_once "./Includes/person.inc.php";
include_once "./Includes/house.inc.php";
```

- into this `index.php` with fileSystemStructure
    - `index.php`
    - `includes/`
        - `autoload.inc.php`
    - `classes/`
        - `person.class.php`
        - `house.class.php`

- `autoload.inc.php`
```php
<?php


spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "classes/";
    $exe  = ".class.php";
    $fullPath = $path . $className . $exe;

    include_once $fullPath;

}

?>
```

- `index.php`
```php
<?php
    include_once "includes/autoloader.inc.php";

    $person01 = new Person("abd" , 21);
    echo $person01->getPerson().PHP_EOL;

    $house01 = new House("khaled Ibn Alwaled" , 12);
    echo $house01->getAddress().PHP_EOL;
?>
```