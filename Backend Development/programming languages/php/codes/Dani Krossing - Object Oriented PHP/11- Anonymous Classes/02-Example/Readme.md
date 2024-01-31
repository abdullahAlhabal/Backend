# Anonymous Class , 

```php
<?php 

$logger = new class {
    public function log(string $message) : void {
        echo "$message";
    }
};

$logger->log("welcome again!");

?>
```