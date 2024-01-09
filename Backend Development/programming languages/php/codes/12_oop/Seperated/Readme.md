
```php in Person.php
class Person  {
    public string $name ; 
    public string $surname;
    protected int $age ; 
    public static int $counter;

    public function __construct($name,$surname){
        $this->name = $name;
        $this->surname = $surname;
        self::$counter++;
    }

    public function setAge($age){
        $this->age = $age;
    }

    public function getAge(){
        return $this->age;
    }

    public function getCounte(){
        return self::$counter;
    }
}
```


# type-hinting for properties 

## Since PHP 7.4 introduces type-hinting for properties,
it is particularly important to provide valid values for all properties, so that all properties have values that match their declared types.


A property that has never been assigned doesn't have a _null_ value, but it is in an _undefined_ *state*, which will never match any declared type. **_undefined !== null_**.

For the code above, if you did:

```php in index.php
require_once "./Person.php";
$p1 = new Person("abdullah alhabal", "abd");
$p1->setAge(22);
```

You would get:

Fatal error: Uncaught Error: Typed property Person::$counter must not be accessed before initialization

Since $counter is neither int nor null when accessing it.

The way to get around this is to assign values to all your properties that match the declared types. You can do this either as _default values_ for the property or _during construction_, depending on your preference and the type of the property.

For example, for the above one could do:

```php in Person.php
class Person {
    public string $name ; 
    public string $surname ;
    protected int $age ;
    public static int $counter = 0 ;    // <-- declaring default _**0**_ value for the property

    public function __construct($name , $surname){
        $this->name = $name ; 
        $this->surname = $surname ;

        self::$counter++;
    }

    public function setAge($age){
        $this->age = $age; 
    }

    public function getAge(){
        return $this->age;
    } 

    public static function getCounter(){
        return self::$counter ;
    }
}
```

Now all properties would have a valid value and the instance would be on a valid state.

This can hit particularly often when you are relying on values that come from the DB for entity values. E.g. auto-generated IDs, or creation and/or updated values; which often are left as a DB concern.

For auto-generated IDs, the recommended way forward is to change the type declaration to:

private ?int $id = null //  like in the Student.php -> public public ?string $studentId = null ; 
For all the rest, just choose an appropriate value for the property's type.