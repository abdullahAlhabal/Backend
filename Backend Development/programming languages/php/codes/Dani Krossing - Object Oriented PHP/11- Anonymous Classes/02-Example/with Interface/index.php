<?php

interface Logger{
    public function log(string $message) : void ;
}

$logger = new class implements Logger {
    public function log(string $message):void {
        echo "$message\n";
    }
};

$logger->log("welcome Again! Anonymous class");

// Implement an Interface
function save(Logger $logger){
    $logger->log("This File was Updated\n");
}

save($logger);

?>